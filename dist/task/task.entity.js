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
Object.defineProperty(exports, "__esModule", { value: true });
exports.data_task_csv = void 0;
const typeorm_1 = require("typeorm");
let data_task_csv = class data_task_csv {
};
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], data_task_csv.prototype, "Change_ID", void 0);
__decorate([
    (0, typeorm_1.Column)(),
    __metadata("design:type", Number)
], data_task_csv.prototype, "Request_ID", void 0);
__decorate([
    (0, typeorm_1.PrimaryColumn)(),
    __metadata("design:type", Number)
], data_task_csv.prototype, "Task_ID", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 6 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Task_Status", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 23 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Task_Types", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 29 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Technician", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 8 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Start_Time", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 5 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Overdue_Status", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 8 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Scheduled_EndTime", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 8 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Scheduled_StartTime", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 4 }),
    __metadata("design:type", String)
], data_task_csv.prototype, "Request_Title", void 0);
data_task_csv = __decorate([
    (0, typeorm_1.Entity)()
], data_task_csv);
exports.data_task_csv = data_task_csv;
//# sourceMappingURL=task.entity.js.map