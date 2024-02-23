import { Component, OnInit } from '@angular/core';
import { UserService } from '../user.service';

import { User } from '../users';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {
  users!: Observable<User[]>;

  constructor(private userService: UserService) { }


  share() {
    window.alert('Hi user');
  }

  onNotify() {
    window.alert('You will be notified from parent component');
  }

  ngOnInit(): void {
    this.users =  this.userService.getUsers();
  }
}