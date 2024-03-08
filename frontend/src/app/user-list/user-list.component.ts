import { Component, OnInit } from '@angular/core';
import { UserService } from '../services/user.service';

import { User } from '../models/users';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {
  users!: Observable<User[]>;
  userSelected: User | undefined = undefined;

  constructor(private userService: UserService) { }


  share(user: User) {
    window.alert('Hi user ' + user.username);
  }

  onNotify() {
    window.alert('You will be notified from parent component');
  }

  ngOnInit(): void {
    this.users =  this.userService.getUsers();
  }

  edit(user: User) {
    this.userSelected = user;
  }

  delete(user: User) {
    
  }
}