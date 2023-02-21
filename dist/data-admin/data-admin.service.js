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
exports.DataAdminService = void 0;
const common_1 = require("@nestjs/common");
const common_2 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const typeorm_2 = require("typeorm");
const data_admin_entity_1 = require("./data-admin.entity");
let DataAdminService = class DataAdminService {
    constructor(dataAdmin) {
        this.dataAdmin = dataAdmin;
    }
    async LihatData() {
        return this.dataAdmin.find();
    }
    async LihatPerData(id) {
        return this.dataAdmin.findOne({ where: { id } });
    }
    async create(data) {
        const dataAdminBaru = this.dataAdmin.create(data);
        await this.dataAdmin.save(dataAdminBaru);
        return dataAdminBaru;
    }
    async update(id, data) {
        return this.dataAdmin.update({ id }, data);
    }
    async delete(id) {
        await this.dataAdmin.delete({ id });
        return { status: true };
    }
    async IniJugaService() {
        return ' ini masuknya ke service';
    }
    IniService() {
        return 'ini masuknya juga ke service';
    }
};
__decorate([
    (0, common_2.Get)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", String)
], DataAdminService.prototype, "IniService", null);
DataAdminService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(data_admin_entity_1.Admin)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], DataAdminService);
exports.DataAdminService = DataAdminService;
//# sourceMappingURL=data-admin.service.js.map