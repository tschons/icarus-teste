import { TestBed } from '@angular/core/testing';

import { PrioridadeService } from './prioridade.service';

describe('PrioridadeService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PrioridadeService = TestBed.get(PrioridadeService);
    expect(service).toBeTruthy();
  });
});
