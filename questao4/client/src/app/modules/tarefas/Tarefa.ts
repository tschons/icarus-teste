export class Tarefa{

  id:number;
  titulo:string;
  descricao:string;
  prioridade:number;

  constructor(
    id:number,
    titulo:string,
    descricao:string,
    prioridade:number
  ){
      this.id = id;
      this.titulo = titulo;
      this.descricao = descricao;
      this.prioridade = prioridade;
  }
}