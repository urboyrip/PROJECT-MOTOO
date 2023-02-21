import { TaskService } from './task.service';
import { dtoTask } from './task.dto';
export declare class TaskController {
    private TaskService;
    constructor(TaskService: TaskService);
    homeTask(): string;
    getDataTask(): Promise<import("./task.entity").data_task_csv[]>;
    getJumlahTask(): Promise<any>;
    getJumlahTaskClosed(): Promise<any>;
    getSLAPoints(): Promise<any>;
    getDataTiketByData(id: number): Promise<import("./task.entity").data_task_csv>;
    postDataTiket(data: dtoTask): Promise<import("./task.entity").data_task_csv>;
    updateDataTiket(id: number, data: Partial<dtoTask>): Promise<import("typeorm").UpdateResult>;
    deleteDataTiket(id: number): Promise<{
        status: boolean;
    }>;
}
