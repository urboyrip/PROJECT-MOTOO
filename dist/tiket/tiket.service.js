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
exports.TiketService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const typeorm_2 = require("typeorm");
const tiket_entity_1 = require("./tiket.entity");
let TiketService = class TiketService {
    constructor(dataTiket) {
        this.dataTiket = dataTiket;
    }
    async LihatData() {
        return this.dataTiket.find();
    }
    async LihatPerData(Request_ID) {
        try {
            const tiket = await this.dataTiket.findOneOrFail({ where: { Request_ID } });
            return tiket;
        }
        catch (err) {
            throw err;
        }
    }
    async CreateData(data) {
        const dataTiketBaru = this.dataTiket.create(data);
        await this.dataTiket.save(dataTiketBaru);
        return dataTiketBaru;
    }
    async UpdateData(Request_ID, data) {
        return this.dataTiket.update({ Request_ID }, data);
    }
    async DeleteData(Request_ID) {
        await this.dataTiket.delete({ Request_ID });
        return { status: true };
    }
    async CountAllData() {
        const totalTiket = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totaltiket")
            .getRawOne();
        return (totalTiket);
    }
    async CountDataClosed() {
        const totalClosed = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalclosed")
            .where("data_tiket_csv.Request_Status = :Request_Status", { Request_Status: "Closed" })
            .getRawOne();
        return (totalClosed);
    }
    async ListDataClosed() {
        const listClosed = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .where("data_tiket_csv.Request_Status = :Request_Status", { Request_Status: "Closed" })
            .getRawMany();
        return (listClosed);
    }
    async CountDataCanceled() {
        const totalCanceled = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalCanceled")
            .where("data_tiket_csv.Request_Status = :Request_Status", { Request_Status: "Canceled" })
            .getRawOne();
        return (totalCanceled);
    }
    async ListDataCanceled() {
        const listCanceled = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .where("data_tiket_csv.Request_Status = :Request_Status", { Request_Status: "Canceled" })
            .getRawMany();
        return (listCanceled);
    }
    async CountDataApproved() {
        const totalApproved = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalApproved")
            .where("data_tiket_csv.Approval_Status = :Approval_Status", { Approval_Status: "Approved" })
            .getRawOne();
        return (totalApproved);
    }
    async ListDataApproved() {
        const listApproved = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .where("data_tiket_csv.Approval_Status = :Approval_Status", { Approval_Status: "Approved" })
            .getRawMany();
        return (listApproved);
    }
    async CountDataIncident() {
        const totalIncident = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalIncident")
            .where("data_tiket_csv.Request_Type = :Request_Type", { Request_Type: "Incident" })
            .getRawOne();
        return (totalIncident);
    }
    async ListDataIncident() {
        const listIncident = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .where("data_tiket_csv.Request_Type = :Request_Type", { Request_Type: "Incident" })
            .getRawMany();
        return (listIncident);
    }
    async CountDataRequest() {
        const totalRequest = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalRequest")
            .where("data_tiket_csv.Request_Type = :Request_Type", { Request_Type: "Request" })
            .getRawOne();
        return (totalRequest);
    }
    async ListDataRequest() {
        const listRequest = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .where("data_tiket_csv.Request_Type = :Request_Type", { Request_Type: "Request" })
            .getRawMany();
        return (listRequest);
    }
    async CountIncidentClosed() {
        const totalIncidentClosed = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalPoints")
            .where("data_tiket_csv.Request_Type = :Request_Type", { Request_Type: "Incident" })
            .andWhere("data_tiket_csv.Request_Status = :Request_Status", { Request_Status: "Closed" })
            .getRawOne();
        return (totalIncidentClosed);
    }
    async CountRequestClosed() {
        const totalIncidentClosed = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalPoints")
            .where("data_tiket_csv.Request_Type = :Request_Type", { Request_Type: "Request" })
            .andWhere("data_tiket_csv.Request_Status = :Request_Status", { Request_Status: "Closed" })
            .getRawOne();
        return (totalIncidentClosed);
    }
    async CountSLAPoints() {
        const totalPoints = await this.dataTiket
            .createQueryBuilder("data_tiket_csv")
            .select("COUNT(*)", "totalPoints")
            .where("data_tiket_csv.DueBy_Time = dummy_motoo_csv.SLA_Time")
            .getRawOne();
        return (totalPoints);
    }
};
TiketService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(tiket_entity_1.data_tiket_csv)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], TiketService);
exports.TiketService = TiketService;
//# sourceMappingURL=tiket.service.js.map