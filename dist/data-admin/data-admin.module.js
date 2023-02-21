"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.DataAdminModule = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const data_admin_entity_1 = require("./data-admin.entity");
const app_controller_1 = require("../app.controller");
const app_service_1 = require("../app.service");
const data_member_entity_1 = require("./data-member.entity");
const data_admin_controller_1 = require("./data-admin.controller");
const data_admin_service_1 = require("./data-admin.service");
let DataAdminModule = class DataAdminModule {
};
DataAdminModule = __decorate([
    (0, common_1.Module)({
        imports: [typeorm_1.TypeOrmModule.forFeature([data_admin_entity_1.Admin, data_member_entity_1.Member])],
        providers: [app_service_1.AppService, data_admin_service_1.DataAdminService],
        controllers: [app_controller_1.AppController, data_admin_controller_1.DataAdminController]
    })
], DataAdminModule);
exports.DataAdminModule = DataAdminModule;
//# sourceMappingURL=data-admin.module.js.map