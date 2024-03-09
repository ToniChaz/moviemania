import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UserListComponent } from './user-list/user-list.component';
import { UserDetailsComponent } from './user-details/user-details.component';
import { InicioComponent } from './inicio/inicio.component';
import { LoginComponent } from './login/login.component';
import { AdminModule } from './admin/admin.module';
import { RegisterComponent } from './register/register.component';


const routes: Routes = [
  // XXX: Se ha modificado el path de la ruta base con InicioComponent
  { path: '', component: InicioComponent },
  { path: 'login', component: LoginComponent },
  { path: 'users/:userId', component: UserDetailsComponent },
  { path: 'admin', loadChildren: () => import('./admin/admin.module').then(module => module.AdminModule) },
  { path: 'register', component: RegisterComponent}
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
