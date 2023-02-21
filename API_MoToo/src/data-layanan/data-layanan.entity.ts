import { Entity, Column, PrimaryGeneratedColumn} from 'typeorm';

@Entity()
export class Layanan{
    @PrimaryGeneratedColumn()
    id : number;

    @Column({length:200})
    nama_layanan : string;

    @Column({length:20})
    biaya : string;
}