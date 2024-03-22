import { Component, OnInit } from '@angular/core';
import { MenuItem } from 'primeng/api';

@Component({
  selector: 'app-top-bar',
  templateUrl: './top-bar.component.html',
  styleUrls: ['./top-bar.component.css']
})
export class TopBarComponent implements OnInit {
  items: MenuItem[] = [];

  ngOnInit() {
    this.items = [
      {
        label: 'Cartelera',
        routerLink: ['/cartelera']
      },
      {
        label: 'Top',
        routerLink: ['/top']
      },
      {
        label: 'Estrenos',
        routerLink: ['/estrenos']
      },
      {
        label: 'Login',
        icon: 'pi pi-fw pi-user',
        routerLink: ['/login']
      }
    ];
  }

  search(event: any) {
    // Implement your search logic here
    console.log(event.target.value);
  }
}