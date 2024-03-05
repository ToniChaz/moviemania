import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AdminContainerComponent } from './components/admin-container/admin-container.component';
import { UsersComponent } from './components/users/users.component';
import { PeliculasComponent } from './components/peliculas/peliculas.component';

const routes: Routes = [
  { 
    path: '',
    component: AdminContainerComponent,
    children: [
      {
        path: '',
        redirectTo: 'usuarios',
        pathMatch: 'full'
      },
      {
        path: 'usuarios',
        component: UsersComponent
      },
      {
        path: 'peliculas',
        component: PeliculasComponent
      }
    ]

  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
