import { HttpClient } from '@angular/common/http';
import { User } from '../users';
import { Injectable } from '@angular/core';
import { Observable, filter, map } from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class UserService {
  constructor(private http: HttpClient) {}

  getUsers() {
    return this.http.get<User[]>('http://localhost:8080/api/users');
  }

  getUserById(userId: number): Observable<User | undefined> {
    return this.http.get<User>(`http://localhost:8080/api/users/${userId}`);
  }
}