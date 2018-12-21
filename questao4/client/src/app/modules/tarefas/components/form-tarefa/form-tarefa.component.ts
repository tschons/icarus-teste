import { Component, OnInit } from '@angular/core';
import { Tarefa } from "../../Tarefa";
import { ActivatedRoute } from "@angular/router";
import { TarefaService } from "../../services/tarefa.service";
import { PrioridadeService } from "../../../prioridades/services/prioridade.service";
import { Prioridade } from "../../../prioridades/Prioridade";

@Component({
  selector: 'app-form-tarefa',
  templateUrl: './form-tarefa.component.html',
  styleUrls: ['./form-tarefa.component.css']
})
export class FormTarefaComponent implements OnInit {

  successMessage:String = '';
  errorMessage:String = '';
  prioridades:Prioridade[];
  tarefa:Tarefa = new Tarefa(0, '', '', 1);

  constructor(
    private tarefaService:TarefaService,
    private prioridadeService:PrioridadeService,
    private activatedRoute: ActivatedRoute
  ) { }

  ngOnInit() {
    const routeParams = this.activatedRoute.snapshot.params;

    this.tarefa.id = routeParams.id;

    this.listPrioridades();

    if(routeParams.id){
      this.loadTarefa(routeParams.id);
    }
  }

  loadTarefa(id:number) {
    this.tarefaService.loadTarefa(id).subscribe(tarefa => {
      this.tarefa = tarefa;
    }, res => {
      this.errorMessage = 'Falha ao carregar a tarefa: ' + res.error.message;
    })
  }

  listPrioridades() {
    this.prioridadeService.listPrioridades().subscribe(prioridades => {
      this.prioridades = prioridades;
    }, res => {
      this.errorMessage = 'Falha ao listar as prioridades: ' + res.error.message;
    })
  }

  validateForm():string {

    let message = '';
    if(
        !this.tarefa.titulo
        || !this.tarefa.descricao
        || !this.tarefa.prioridade
    ) {
        message = 'Favor preencher todos os campos obrigatórios';
    }

    return message;
  }

  clearForm() {
    this.errorMessage = '';
    this.successMessage = '';

    this.tarefa.id = 0;
    this.tarefa.titulo = '';
    this.tarefa.descricao = '';
    this.tarefa.prioridade = 1;
  }

  save() {
    this.errorMessage = '';
    this.successMessage = '';

    let validateMessage = this.validateForm();
    if(validateMessage){
      this.errorMessage = validateMessage;
      return false;
    }

    if(!this.tarefa.id){
      this.tarefaService.createTarefa(this.tarefa).subscribe(res => {

        this.tarefa.id = res.id;
        this.successMessage = 'Tarefa cadastrada com sucesso';
      }, res => {
        this.errorMessage = 'Falha ao cadastrar tarefa: ' + res.error.message;
      })

    } else {
      this.tarefaService.editTarefa(this.tarefa).subscribe(res => {
        this.successMessage = 'Tarefa atualizada com sucesso';
      }, res => {
        this.errorMessage = 'Falha ao atualizar tarefa: ' + res.error.message;
      });
    }
  }
}
