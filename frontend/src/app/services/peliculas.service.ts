import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, filter, map } from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class PeliculasService {
  constructor(private http: HttpClient) {}

  getAPiData(queryParams:string = ""): Observable<any> {
    const options = { 
      method: 'GET',
      headers: {
        accept: 'application/json',
        Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZTMzMWQzNzk1ZmM5M2MwODc5MjU3NWQ4MjRjZGMyNyIsInN1YiI6IjY1ZTY1ZTA1ZTgxMzFkMDE4NjBiNjA0ZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.1f-iF3BBH7RVLmUUxfGaNKjF1boaA0SOPgWmIvOwDDc'
      }
    };

    return this.http.get<any>('https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=es-ES&page=2&sort_by=popularity.desc&year=2024', options)
    .pipe(
      map(x => x.results.filter((y: any) => y.poster_path && y.overview))
    );
  }
}

/* https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=es-ES&page=1&sort_by=popularity.desc&year=2024*/