import { Component } from '@angular/core';
import { MenuItem } from 'primeng/api';

@Component({
  selector: 'app-admin-side-bar',
  templateUrl: './admin-side-bar.component.html',
  styleUrl: './admin-side-bar.component.css'
})
export class AdminSideBarComponent {
  items: MenuItem[];

  constructor() {
    this.items = [];
  }

  ngOnInit() {
    this.items = [
      {
        label: 'Usuarios',
        icon: 'pi pi-fw pi-user',
        routerLink: './usuarios'
      },
      {
        label: 'Películas',
        icon: 'pi pi-fw pi-video',
        routerLink: './peliculas'
      }
    ];
  }
}