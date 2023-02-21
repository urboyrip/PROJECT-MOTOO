import { Repository } from 'typeorm';
import { data_task_csv } from './task.entity';
import { dtoTask } from './task.dto';
export declare class TaskService {
    protected dataTask: Repository<data_task_csv>;
    constructor(dataTask: Repository<data_task_csv>);
    LihatData(): Promise<data_task_csv[]>;
    LihatPerData(Task_ID: number): Promise<data_task_csv>;
    CreateData(data: dtoTask): Promise<data_task_csv>;
    UpdateData(Task_ID: number, data: Partial<dtoTask>): Promise<import("typeorm").UpdateResult>;
    DeleteData(Task_ID: number): Promise<{
        status: boolean;
    }>;
    CountAllData(): Promise<any>;
    CountSLAPoints(): Promise<any>;
    CountTaskClosed(): Promise<any>;
}
