import { Component, OnInit, ViewEncapsulation } from '@angular/core';
import { PeliculasService } from '../../../services/peliculas.service';
import { firstValueFrom } from 'rxjs';

@Component({
  selector: 'app-peliculas',
  templateUrl: './peliculas.component.html',
  styleUrl: './peliculas.component.css',
  encapsulation: ViewEncapsulation.None
})
export class PeliculasComponent implements OnInit {
  public readonly urlBase: string = 'https://image.tmdb.org/t/p/original';
  pelis: any = [];

  constructor(private peliculasService: PeliculasService) {

  }

  ngOnInit(): void {
    this.getMovie();
  }

  async getMovie() {
    let movie$ = this.peliculasService.getAPiData();
    this.pelis = await firstValueFrom(movie$);
  }
}