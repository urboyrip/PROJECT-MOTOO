"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.TaskService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const typeorm_2 = require("typeorm");
const task_entity_1 = require("./task.entity");
let TaskService = class TaskService {
    constructor(dataTask) {
        this.dataTask = dataTask;
    }
    async LihatData() {
        return this.dataTask.find();
    }
    async LihatPerData(Task_ID) {
        try {
            const tiket = await this.dataTask.findOneOrFail({ where: { Task_ID } });
            return tiket;
        }
        catch (err) {
            throw err;
        }
    }
    async CreateData(data) {
        const dataTaskBaru = this.dataTask.create(data);
        await this.dataTask.save(dataTaskBaru);
        return dataTaskBaru;
    }
    async UpdateData(Task_ID, data) {
        return this.dataTask.update({ Task_ID }, data);
    }
    async DeleteData(Task_ID) {
        await this.dataTask.delete({ Task_ID });
        return { status: true };
    }
    async CountAllData() {
        const totalTask = await this.dataTask
            .createQueryBuilder("data_task_csv")
            .select("COUNT(*)", "totalTask")
            .getRawOne();
        return (totalTask);
    }
    async CountSLAPoints() {
        const totalPoints = await this.dataTask
            .createQueryBuilder("data_task_csv")
            .select("COUNT(*)", "totalPoints")
            .where("data_task_csv.Overdue_Status = :Overdue_Status", { Overdue_Status: "FALSE" })
            .getRawOne();
        return (totalPoints);
    }
    async CountTaskClosed() {
        const totalClosed = await this.dataTask
            .createQueryBuilder('data_task_csv')
            .select("COUNT(*)", "totalClosed")
            .where("data_task_csv.Task_Status = :Task_Status", { Task_Status: "Closed" })
            .getRawOne();
        return (totalClosed);
    }
};
TaskService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(task_entity_1.data_task_csv)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], TaskService);
exports.TaskService = TaskService;
//# sourceMappingURL=task.service.js.map