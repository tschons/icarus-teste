import { Injectable } from '@angular/core';
import { Observable } from "rxjs";
import { environment } from "../../../../environments/environment.prod";
import { HttpClient } from "@angular/common/http";
import { Prioridade } from "../Prioridade";

@Injectable({
  providedIn: 'root'
})
export class PrioridadeService {

  constructor(
      private httpClient:HttpClient
  ) { }

  listPrioridades():Observable<Prioridade[]>{

    return this.httpClient.get<Prioridade[]>(environment.apiUrl + '/prioridades');
  }
}
