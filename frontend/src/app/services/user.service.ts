import { HttpClient, HttpParams } from '@angular/common/http';
import { User } from '../models/users';
import { Injectable } from '@angular/core';
import { Observable, filter, map } from 'rxjs';
import { LazyResult } from '../models/lazyLoadResult';

@Injectable({
  providedIn: 'root'
})

export class UserService {
  constructor(private http: HttpClient) {}

  getUsers() {
    return this.http.get<User[]>(`http://localhost:8080/api/users`);
  }

/*   getUsersLazy(limit: number, offset: any, filters: any, order:any) {
    let data = {
      filters: filters,
      order: order,
      limit: limit,
      offset: offset
    };
    let query = encodeURIComponent(JSON.stringify(data));
    return this.http.get<LazyResult<User>>(`http://localhost:8080/api/users/${query}`);
  } */
  getUsersLazy(limit: number, offset: number, filters: any, order: any) {

    let params = new HttpParams()
      .set('limit', limit)
      .set('offset', offset)
      .set('filters', JSON.stringify(filters))
      .set('order', JSON.stringify(order));

    return this.http.get<LazyResult<User>>('http://localhost:8080/api/users', { params });
  }

  getUserById(userId: number): Observable<User | undefined> {
    return this.http.get<User>(`http://localhost:8080/api/users/${userId}`);
  }

  deleteUser(userId: number) {
    return this.http.delete<void>(`http://localhost:8080/api/users/${userId}`);
  }

  updateUser(user: User) {
    return this.http.put<any>(`http://localhost:8080/api/users`, user);
  }
}