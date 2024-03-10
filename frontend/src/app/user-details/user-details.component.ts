import { Component, Input, OnDestroy, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { User } from '../models/users';
import { UserService } from '../services/user.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-users-details',
  templateUrl: './user-details.component.html',
  styleUrl: './user-details.component.css'
})

export class UserDetailsComponent implements OnInit, OnDestroy {
  private subscription: Subscription;
  @Input() user: User | undefined;

  constructor(private route: ActivatedRoute, private userService: UserService) {
    this.subscription = new Subscription();
   }

  ngOnInit() {
    // First get the user id from the current route.
    const routeParams = this.route.snapshot.paramMap;
    const userIdFromRoute = Number(routeParams.get('userId'));

    this.subscription = this.userService.getUserById(userIdFromRoute).subscribe({
      next: (user) => {
        this.user = user;
      }
    });
  }

  ngOnDestroy() {
      this.subscription.unsubscribe();
  }
}
