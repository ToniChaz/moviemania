import { Component } from '@angular/core';

import { users } from '../users';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent {
  users = [...users];

  share() {
    window.alert('Hi user');
  }

  onNotify() {
    window.alert('You will be notified from parent component');
  }
}