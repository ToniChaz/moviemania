import { HttpClient } from '@angular/common/http';
import { User } from './users';
import { Injectable } from '@angular/core';
import { Observable, filter, map } from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class UserService {
  items: User[] = [];

  constructor(private http: HttpClient) {}

  getUsers() {
    return this.http.get<User[]>('assets/users.json');
  }

  getUserById(userId: number): Observable<User | undefined> {
    return this.getUsers()
    .pipe(
      map(users => users.find(user => user.id == userId))
    );
  }
}