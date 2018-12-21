import { Injectable } from '@angular/core';
import { Observable } from "rxjs";
import { HttpClient, HttpParams } from "@angular/common/http";
import { environment } from "../../../../environments/environment.prod"
import { Tarefa } from "../Tarefa";

@Injectable({
  providedIn: 'root'
})
export class TarefaService {

  constructor(
      private httpClient:HttpClient
  ) { }

  listTarefas():Observable<Tarefa[]>{

    return this.httpClient.get<Tarefa[]>(environment.apiUrl + '/tarefas');
  }

  loadTarefa(id:number):Observable<Tarefa>{

    return this.httpClient.get<Tarefa>(environment.apiUrl + '/tarefa/' + id);
  }

  editTarefa(tarefa:Tarefa):Observable<any>{
    return this.httpClient.put(environment.apiUrl + '/tarefa/' + tarefa.id, tarefa);
  }

  deleteTarefa(id:number):Observable<any>{
    return this.httpClient.delete(environment.apiUrl + '/tarefa/' + id);
  }

  createTarefa(tarefa:Tarefa):Observable<any>{
    return this.httpClient.post(environment.apiUrl + '/tarefa', tarefa);
  }
}
