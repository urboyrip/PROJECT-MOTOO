import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { TaskController } from './task.controller';
import { data_task_csv } from './task.entity';
import { TaskService } from './task.service';

@Module({
  imports : [TypeOrmModule.forFeature([data_task_csv])],
  controllers: [TaskController],
  providers: [TaskService]
})
export class TaskModule {}
