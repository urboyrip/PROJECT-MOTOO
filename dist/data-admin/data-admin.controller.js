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
exports.DataAdminController = void 0;
const common_1 = require("@nestjs/common");
const data_admin_service_1 = require("./data-admin.service");
const data_admin_dto_1 = require("./data-admin.dto");
let DataAdminController = class DataAdminController {
    constructor(DataAdminService) {
        this.DataAdminService = DataAdminService;
    }
    IniController() {
        return 'Ini masuknya ke Controller default';
    }
    NewRecord(data) {
        return this.DataAdminService.create(data);
    }
    EditRecord(id, data) {
        return this.DataAdminService.update(id, data);
    }
    DeleteRecord(id) {
        return this.DataAdminService.delete(id);
    }
    IniJugaController() {
        return this.DataAdminService.IniJugaService();
    }
    IniDataAdmin() {
        return this.DataAdminService.LihatData();
    }
    IniCotrollerPerdata(id) {
        return this.DataAdminService.LihatPerData(id);
    }
    IniControllerID(id) {
        return 'Ini masuknya ke Controller ID' + ',' + ' ini halaman ' + id;
    }
    IniIkutController() {
        return this.DataAdminService.IniService();
    }
};
__decorate([
    (0, common_1.Get)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", String)
], DataAdminController.prototype, "IniController", null);
__decorate([
    (0, common_1.Post)(),
    __param(0, (0, common_1.Body)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [data_admin_dto_1.dataBaru]),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "NewRecord", null);
__decorate([
    (0, common_1.Put)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __param(1, (0, common_1.Body)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Number, Object]),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "EditRecord", null);
__decorate([
    (0, common_1.Delete)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Number]),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "DeleteRecord", null);
__decorate([
    (0, common_1.Get)('service'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "IniJugaController", null);
__decorate([
    (0, common_1.Get)('data'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "IniDataAdmin", null);
__decorate([
    (0, common_1.Get)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Number]),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "IniCotrollerPerdata", null);
__decorate([
    (0, common_1.Get)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [String]),
    __metadata("design:returntype", String)
], DataAdminController.prototype, "IniControllerID", null);
__decorate([
    (0, common_1.Get)('service/iya'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], DataAdminController.prototype, "IniIkutController", null);
DataAdminController = __decorate([
    (0, common_1.Controller)('data-admin'),
    __metadata("design:paramtypes", [data_admin_service_1.DataAdminService])
], DataAdminController);
exports.DataAdminController = DataAdminController;
//# sourceMappingURL=data-admin.controller.js.map