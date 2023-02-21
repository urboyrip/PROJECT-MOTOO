import { Test, TestingModule } from '@nestjs/testing';
import { DataAdminService } from './data-admin.service';

describe('DataAdminService', () => {
  let service: DataAdminService;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [DataAdminService],
    }).compile();

    service = module.get<DataAdminService>(DataAdminService);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });
});
