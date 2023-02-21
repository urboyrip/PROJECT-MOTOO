import { Test, TestingModule } from '@nestjs/testing';
import { DataAdminController } from './data-admin.controller';

describe('DataAdminController', () => {
  let controller: DataAdminController;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [DataAdminController],
    }).compile();

    controller = module.get<DataAdminController>(DataAdminController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });
});
