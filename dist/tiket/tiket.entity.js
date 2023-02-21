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
exports.data_tiket_csv = void 0;
const typeorm_1 = require("typeorm");
let data_tiket_csv = class data_tiket_csv {
};
__decorate([
    (0, typeorm_1.Column)({ length: 28 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Technician", void 0);
__decorate([
    (0, typeorm_1.PrimaryColumn)(),
    __metadata("design:type", Number)
], data_tiket_csv.prototype, "Request_ID", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 128 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Subject", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 10 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Created_Time", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 10 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "DueBy_Time", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 10 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "SLA_Time", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 8 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Request_Type", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 8 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Request_Status", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 16 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Approval_Status", void 0);
__decorate([
    (0, typeorm_1.Column)({ length: 24 }),
    __metadata("design:type", String)
], data_tiket_csv.prototype, "Site", void 0);
data_tiket_csv = __decorate([
    (0, typeorm_1.Entity)()
], data_tiket_csv);
exports.data_tiket_csv = data_tiket_csv;
//# sourceMappingURL=tiket.entity.js.map