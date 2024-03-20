import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { PeliculasService } from '../services/peliculas.service';
import { lastValueFrom } from 'rxjs';
import { MessageService } from 'primeng/api';

@Component({
  selector: 'app-inicio',
  templateUrl: './inicio.component.html',
  styleUrls: ['./inicio.component.css'],
  encapsulation: ViewEncapsulation.None
})
export class InicioComponent implements OnInit {
  public readonly urlBase: string = 'https://image.tmdb.org/t/p/original';
  pelis: any = [];

  constructor(private peliculasService: PeliculasService, private messageService: MessageService) { }

  ngOnInit(): void {
    this.getMovie();
  }

  async getMovie() {
    try {
      let movie$ = this.peliculasService.getAPiData();
      this.pelis = await lastValueFrom(movie$);
    } catch (error) {
    }
  }
  throwError() {
    throw new Error('This is a test error'); // prueba para forzar un error
  }

}