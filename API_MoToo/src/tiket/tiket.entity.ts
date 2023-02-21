import { Entity,Column, PrimaryColumn } from "typeorm";

@Entity()
export class data_tiket_csv{
    @Column({length:28})
    Technician : string;

    @PrimaryColumn()
    Request_ID : number;

    @Column({length:128})
    Subject : string;

    @Column({length:10})
    Created_Time : string;

    @Column({length:10})
    DueBy_Time : string;

    @Column({length:10})
    SLA_Time : string;

    @Column({length:8})
    Request_Type : string;

    @Column({length:8})
    Request_Status : string;

    @Column({length:16})
    Approval_Status : string;

    @Column({length:24})
    Site : string;
}