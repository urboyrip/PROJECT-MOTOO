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
exports.TiketController = void 0;
const common_1 = require("@nestjs/common");
const tiket_service_1 = require("./tiket.service");
const tiket_dto_1 = require("./tiket.dto");
const decorators_1 = require("@nestjs/common/decorators");
let TiketController = class TiketController {
    constructor(TiketService) {
        this.TiketService = TiketService;
    }
    homeTiket() {
        return 'Kamu berhasil masuk ke halaman tiket';
    }
    getDataTiket() {
        return this.TiketService.LihatData();
    }
    getJumlahTiket() {
        return this.TiketService.CountAllData();
    }
    getJumlahClosed() {
        return this.TiketService.CountDataClosed();
    }
    getListClosed() {
        return this.TiketService.ListDataClosed();
    }
    getJumlahCanceled() {
        return this.TiketService.CountDataCanceled();
    }
    getListCanceled() {
        return this.TiketService.ListDataCanceled();
    }
    getJumlahApproved() {
        return this.TiketService.CountDataApproved();
    }
    getListApproved() {
        return this.TiketService.ListDataApproved();
    }
    getJumlahIncident() {
        return this.TiketService.CountDataIncident();
    }
    getListIncident() {
        return this.TiketService.ListDataIncident();
    }
    getJumlahRequest() {
        return this.TiketService.CountDataRequest();
    }
    getListRequest() {
        return this.TiketService.ListDataRequest();
    }
    getSLAPoints() {
        return this.TiketService.CountSLAPoints();
    }
    getIncidentClosed() {
        return this.TiketService.CountIncidentClosed();
    }
    getRequestClosed() {
        return this.TiketService.CountRequestClosed();
    }
    getDataTiketByData(id) {
        return this.TiketService.LihatPerData(id);
    }
    postDataTiket(data) {
        return this.TiketService.CreateData(data);
    }
    updateDataTiket(id, data) {
        return this.TiketService.UpdateData(id, data);
    }
    deleteDataTiket(id) {
        return this.TiketService.DeleteData(id);
    }
};
__decorate([
    (0, common_1.Get)(),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "homeTiket", null);
__decorate([
    (0, common_1.Get)('data'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getDataTiket", null);
__decorate([
    (0, common_1.Get)('jumlah-tiket'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getJumlahTiket", null);
__decorate([
    (0, common_1.Get)('jumlah-closed'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getJumlahClosed", null);
__decorate([
    (0, common_1.Get)('list-closed'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getListClosed", null);
__decorate([
    (0, common_1.Get)('jumlah-canceled'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getJumlahCanceled", null);
__decorate([
    (0, common_1.Get)('list-canceled'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getListCanceled", null);
__decorate([
    (0, common_1.Get)('jumlah-approved'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getJumlahApproved", null);
__decorate([
    (0, common_1.Get)('list-approved'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getListApproved", null);
__decorate([
    (0, common_1.Get)('jumlah-incident'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getJumlahIncident", null);
__decorate([
    (0, common_1.Get)('list-incident'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getListIncident", null);
__decorate([
    (0, common_1.Get)('jumlah-request'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getJumlahRequest", null);
__decorate([
    (0, common_1.Get)('list-request'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getListRequest", null);
__decorate([
    (0, common_1.Get)('SLAPoints'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getSLAPoints", null);
__decorate([
    (0, common_1.Get)('IncidentClosed'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getIncidentClosed", null);
__decorate([
    (0, common_1.Get)('RequestClosed'),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", []),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getRequestClosed", null);
__decorate([
    (0, common_1.Get)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Number]),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "getDataTiketByData", null);
__decorate([
    (0, common_1.Post)(),
    __param(0, (0, common_1.Body)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [tiket_dto_1.dtoTiket]),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "postDataTiket", null);
__decorate([
    (0, common_1.Put)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __param(1, (0, common_1.Body)()),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Number, Object]),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "updateDataTiket", null);
__decorate([
    (0, decorators_1.Delete)(':id'),
    __param(0, (0, common_1.Param)('id')),
    __metadata("design:type", Function),
    __metadata("design:paramtypes", [Number]),
    __metadata("design:returntype", void 0)
], TiketController.prototype, "deleteDataTiket", null);
TiketController = __decorate([
    (0, common_1.Controller)('tiket'),
    __metadata("design:paramtypes", [tiket_service_1.TiketService])
], TiketController);
exports.TiketController = TiketController;
//# sourceMappingURL=tiket.controller.js.map