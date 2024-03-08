import { HttpClient } from '@angular/common/http';
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

  getUsersLazy(skipRows: number, pageSize: number, filters: any) {
    return this.http.post<LazyResult<User>>(`http://localhost:8080/api/users/${skipRows}/${pageSize}`, filters);
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