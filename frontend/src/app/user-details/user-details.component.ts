import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { User } from '../users';

@Component({
  selector: 'app-users-details',
  templateUrl: './user-details.component.html',
  styleUrl: './user-details.component.css'
})

export class UserDetailsComponent implements OnInit {

  user: User | undefined;

  constructor(private route: ActivatedRoute) { }

  ngOnInit() {
    // First get the user id from the current route.
    const routeParams = this.route.snapshot.paramMap;
    const userIdFromRoute = Number(routeParams.get('userId'));
  
    // TODO Find the user that correspond with the id provided in route.
    // this.user = users.find(user => user.id === userIdFromRoute);
    // Call again the service and fect the details
  }
}
