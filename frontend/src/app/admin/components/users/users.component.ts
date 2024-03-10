import { Component, OnDestroy } from '@angular/core';
import { User } from '../../../models/users';
import { UserService } from '../../../services/user.service';
import { Observable, lastValueFrom } from 'rxjs';
import { TableLazyLoadEvent } from 'primeng/table';
import { LazyResult } from '../../../models/lazyLoadResult';
import { ConfirmationService } from 'primeng/api';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrl: './users.component.css'
})
export class UsersComponent {

  totalRecords: number = 0;
  users$: Observable<LazyResult<User>> | undefined;
  users: User[];
  skipRows: number;
  pageSize: number;
  loading: boolean | undefined;
  checked: boolean | null;
  userBackUp: any;
  filters: any = {
    id: null,
    username: null,
    name: null,
    birthdate: null,
    email: null,
    isAdmin: null
  };

  lazyObj: any;
  selectedUser: User | null;
  // deleting: any;

  constructor(private userService: UserService, private confirmationService: ConfirmationService) {
    this.checked = null;
    this.selectedUser = null;
    this.skipRows = 0;
    this.pageSize = 5;
    this.users = [];

    this.lazyObj = {
      filters: {
        id: null,
        username: null,
        name: null,
        birthdate: null,
        email:  null,
        isAdmin: null
      },
      order: {
        sortField: null,
        sortOrder: null
      },
      pagination: {
        pageSize: this.pageSize,
        skipRows: this.skipRows
      }
    };
  }

  pageChange($event: TableLazyLoadEvent) {
    let filter: any = $event.filters || null;

    this.lazyObj = {
      filters: {
        id: filter.id?.value || null,
        username: filter.username?.value || null,
        name: filter.name?.value || null,
        birthdate: filter.birthdate?.value || null,
        email: filter.email?.value || null,
        isAdmin: filter.isAdmin?.value == null ? null : +filter.isAdmin?.value
      },
      order: {
        sortField: $event.sortField || null,
        sortOrder: $event.sortOrder == 1 ? "ASC" : "DESC"
      },
      pagination: {
        pageSize: $event.rows || this.pageSize,
        skipRows: $event.first || this.skipRows
      }
    }

    this.users$ = this.userService.getUsersLazy(this.lazyObj);

    this.getUsers();
  }

  onRowEditInit(user: User) {
    console.log("Iniciando la modificación del user " + user.username);
    this.userBackUp = { ...user };
  }

  onRowEditSave(user: User) {
    let update$ = this.userService.updateUser(user);
    lastValueFrom(update$)
      .then(() => {
        console.log("Se actualizó correctamente");
        this.getUsers();
      })
      .catch(() => {
        console.error("Ocurrió un error al actualizar");
      });
  }

  onRowEditCancel(user: User) {
    let index = this.users.findIndex(x => x.id == user.id)
    this.users[index] = this.userBackUp;
    this.userBackUp = null;
  }

  onRowDelete($event: Event, user: User) {
    this.selectedUser = { ...user };
    let delete$ = this.userService.deleteUser(user.id);

    this.confirmationService.confirm({
      target: $event.target as EventTarget,
      message: user.username,
      acceptLabel: "",
      rejectLabel: "",
      acceptIcon: "none",
      rejectIcon: "none",

      accept: () => {
        // this.messageService.add({ severity: 'info', summary: 'Confirmed', detail: 'Record deleted' });

        lastValueFrom(delete$)
        .then(() => {
          console.log("Se borró correctamente");
          // this.deleting = false;
          this.getUsers();
          this.selectedUser = null;
        })
        .catch(() => {
          console.error("Ocurrió un error al borrar");
          this.selectedUser = null;
        });
      },
      reject: () => {
        this.selectedUser = null;
        // this.messageService.add({ severity: 'error', summary: 'Rejected', detail: 'You have rejected' });
      },
    });

    

    // this.subscriptions.add(delete$.subscribe({
    //   next: data => {
    //     let result = data;
    //   },
    //   error: err => {
    //   }
    // }));


  }

  private async getUsers() {
    let result = await lastValueFrom(this.users$!);
    this.users = result.data;
    this.totalRecords = result.totalRecords;
  }
}