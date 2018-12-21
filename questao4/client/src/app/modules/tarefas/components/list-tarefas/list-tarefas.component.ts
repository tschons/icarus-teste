import { Component, OnInit } from '@angular/core';
import { TarefaService } from "../../services/tarefa.service";
import { Tarefa } from "../../Tarefa";

@Component({
  selector: 'app-list-tarefas',
  templateUrl: './list-tarefas.component.html',
  styleUrls: ['./list-tarefas.component.css']
})
export class ListTarefasComponent implements OnInit {

  successMessage:String = '';
  errorMessage:String = '';
  tarefas:Tarefa[];

  constructor(
    private tarefaService:TarefaService
  ) { }

  ngOnInit() {

    this.listTarefas();
  }

  listTarefas() {
    this.tarefaService.listTarefas().subscribe(tarefas => {
      console.log(tarefas);
      this.tarefas = tarefas;
    }, res => {
      this.errorMessage = 'Falha ao listar tarefas: ' + res.error.message;
    })
  }

  deleteTarefa(id:number) {

    if(confirm('Tem certeza que deseja excluir o registro ' + id + '?')) {
      this.tarefaService.deleteTarefa(id).subscribe(res => {
        this.successMessage = 'Tarefa excluída com sucesso';

        this.listTarefas();
      }, res => {
        this.errorMessage = 'Falha ao excluir tarefa: ' + res.error.message;
      })
    }
  }
}
