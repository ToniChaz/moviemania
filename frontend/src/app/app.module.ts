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
import { ErrorHandler } from '@angular/core';
import { MessageService } from 'primeng/api';
import { MessagesModule } from 'primeng/messages';
import { MessageModule } from 'primeng/message';
import { AppErrorHandler } from './services/app-error-handler';
import { CardModule } from 'primeng/card';
import { MenubarModule } from 'primeng/menubar';
import { InicioComponent } from './inicio/inicio.component';

@NgModule({
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    HttpClientModule,
    RegisterComponent,
    LoginComponent,
    AppRoutingModule,
    AdminModule,
    MenubarModule,
    ButtonModule,
    MessagesModule,
    MessageModule,
    CardModule
  ],
  declarations: [
    AppComponent,
    TopBarComponent,
    UserListComponent,
    UserAlertsComponent,
    UserDetailsComponent,
    InicioComponent
  ],
  exports: [
    CardModule
  ],
  providers: [
    MessageService,
    { provide: ErrorHandler, useClass: AppErrorHandler }
  ],
  bootstrap: [
    AppComponent
  ]
})
export class AppModule { }