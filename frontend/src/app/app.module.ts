import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppComponent } from './app.component';
import { TopBarComponent } from './top-bar/top-bar.component';
import { UserListComponent } from './user-list/user-list.component';
import { UserAlertsComponent } from './user-alerts/user-alerts.component';
import { UserDetailsComponent } from './user-details/user-details.component';
import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';
import { AppRoutingModule } from './app-routing.module';
import { AdminModule } from './admin/admin.module';
import { ButtonModule } from 'primeng/button';


@NgModule({
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,
    RegisterComponent,
    LoginComponent,
    AppRoutingModule,
    AdminModule,
    ButtonModule
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