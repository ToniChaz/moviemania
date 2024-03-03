import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UserListComponent } from './user-list/user-list.component';
import { UserDetailsComponent } from './user-details/user-details.component';
import { InicioComponent } from './inicio/inicio.component';
import { LoginComponent } from './login/login.component';


const routes: Routes = [
  // XXX: Se ha modificado el path de la ruta base con InicioComponent
  { path: '', component: InicioComponent },
  { path: 'login', component: LoginComponent, },
  { path: 'user-list', component: UserListComponent },
  { path: 'users/:userId', component: UserDetailsComponent }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
