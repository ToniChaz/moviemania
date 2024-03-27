<?php

function buildWhereClause($filters)
{
    $where = "";

    if (!is_null($filters)) {
        foreach ($filters as $key => $value) {
            if (!is_null($value)) {
                $where .= strpos($where, "WHERE") !== false ? "AND " : "WHERE ";
                $where .= $key . " like '%" . $value . "%' ";
            }
        }
    }

    return $where;
}

function buildOrderClause($order)
{
    $orderClause = "";

    if (!is_null($order->sortField)) {
        $orderClause = " ORDER BY ".$order->sortField." ".$order->sortOrder;
    }

    return $orderClause;
}
