import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { AdminRoutingModule } from './admin-routing.module';
import { AdminContainerComponent } from './components/admin-container/admin-container.component';
import { PeliculasComponent } from './components/peliculas/peliculas.component';
import { AdminSideBarComponent } from './components/admin-side-bar/admin-side-bar.component';
import { UsersComponent } from './components/users/users.component';
import { PanelMenuModule } from 'primeng/panelmenu';
import { TableModule } from 'primeng/table';
import { TriStateCheckboxModule } from 'primeng/tristatecheckbox';
import { FormsModule } from '@angular/forms';
import { ButtonModule } from 'primeng/button';
import { CalendarModule } from 'primeng/calendar';
import { CheckboxModule } from 'primeng/checkbox';

@NgModule({
  declarations: [
    AdminContainerComponent,
    PeliculasComponent,
    AdminSideBarComponent,
    UsersComponent
  ],
  imports: [
    CommonModule,
    AdminRoutingModule,
    PanelMenuModule,
    TableModule,
    FormsModule,
    TriStateCheckboxModule,
    ButtonModule,
    CalendarModule,
    CheckboxModule
  ]
})
export class AdminModule { }
