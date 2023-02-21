"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.TiketModule = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const tiket_controller_1 = require("./tiket.controller");
const tiket_entity_1 = require("./tiket.entity");
const tiket_service_1 = require("./tiket.service");
let TiketModule = class TiketModule {
};
TiketModule = __decorate([
    (0, common_1.Module)({
        imports: [typeorm_1.TypeOrmModule.forFeature([tiket_entity_1.data_tiket_csv])],
        controllers: [tiket_controller_1.TiketController],
        providers: [tiket_service_1.TiketService]
    })
], TiketModule);
exports.TiketModule = TiketModule;
//# sourceMappingURL=tiket.module.js.map