import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule } from '@angular/router';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { TopBarComponent } from './top-bar/top-bar.component';
import { UserListComponent } from './user-list/user-list.component';
import { UserAlertsComponent } from './user-alerts/user-alerts.component';
import { UserDetailsComponent } from './user-details/user-details.component';
import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';

@NgModule({
  imports: [
    BrowserModule,
    HttpClientModule,
    RegisterComponent,
    LoginComponent,
    RouterModule.forRoot([
      { path: '', component: UserListComponent },
      { path: 'users/:userId', component: UserDetailsComponent },
    ])
  ],
  declarations: [
    AppComponent,
    TopBarComponent,
    UserListComponent,
    UserAlertsComponent,
    UserDetailsComponent
  ],
  bootstrap: [
    AppComponent
  ]
})
export class AppModule { }