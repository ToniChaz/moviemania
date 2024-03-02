import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { User } from '../users';
import { UserService } from '../user.service';
import { map } from 'rxjs';

@Component({
  selector: 'app-users-details',
  templateUrl: './user-details.component.html',
  styleUrl: './user-details.component.css'
})

export class UserDetailsComponent implements OnInit {

  user: User | undefined;

  constructor(private route: ActivatedRoute, private userService: UserService) { }

  ngOnInit() {
    // First get the user id from the current route.
    const routeParams = this.route.snapshot.paramMap;
    const userIdFromRoute = Number(routeParams.get('userId'));

    this.userService.getUserById(userIdFromRoute).subscribe({
      next: (user) => {
        this.user = user;
      }
    });
  }
}
