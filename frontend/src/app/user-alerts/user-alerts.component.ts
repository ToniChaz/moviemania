import { Component, Input, Output, EventEmitter } from '@angular/core';
import { User } from '../users';

@Component({
  selector: 'app-user-alerts',
  templateUrl: './user-alerts.component.html',
  styleUrl: './user-alerts.component.css'
})
export class UserAlertsComponent {  
  @Input() user: User | undefined;
  @Output() notify = new EventEmitter();
}
