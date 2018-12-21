import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListTarefasComponent } from "./modules/tarefas/components/list-tarefas/list-tarefas.component";
import { FormTarefaComponent } from "./modules/tarefas/components/form-tarefa/form-tarefa.component";

const routes: Routes = [
  {
    path: '',
    component: ListTarefasComponent
  },
  {
    path: 'tarefa',
    component: FormTarefaComponent
  },
  {
    path: 'tarefa/:id',
    component: FormTarefaComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
