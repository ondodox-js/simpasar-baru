PGDMP     7                    z            db_pasar    14.3    14.3 ?    D           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            E           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            F           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            G           1262    16402    db_pasar    DATABASE     k   CREATE DATABASE db_pasar WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE db_pasar;
                postgres    false            �            1259    19585    artikels    TABLE     *  CREATE TABLE public.artikels (
    id_artikel bigint NOT NULL,
    judul character varying(191) NOT NULL,
    deskripsi text NOT NULL,
    link character varying(191) NOT NULL,
    waktu_terbit timestamp(0) without time zone NOT NULL,
    waktu_perubahan timestamp(0) without time zone NOT NULL
);
    DROP TABLE public.artikels;
       public         heap    postgres    false            �            1259    19584    artikels_id_artikel_seq    SEQUENCE     �   CREATE SEQUENCE public.artikels_id_artikel_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.artikels_id_artikel_seq;
       public          postgres    false    216            H           0    0    artikels_id_artikel_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.artikels_id_artikel_seq OWNED BY public.artikels.id_artikel;
          public          postgres    false    215            �            1259    19577    lapaks    TABLE     �   CREATE TABLE public.lapaks (
    id_lapak bigint NOT NULL,
    posisi character varying(191) NOT NULL,
    luas character varying(191) NOT NULL,
    harga_sewa double precision NOT NULL,
    status boolean DEFAULT true NOT NULL
);
    DROP TABLE public.lapaks;
       public         heap    postgres    false            �            1259    19576    lapaks_id_lapak_seq    SEQUENCE     |   CREATE SEQUENCE public.lapaks_id_lapak_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.lapaks_id_lapak_seq;
       public          postgres    false    214            I           0    0    lapaks_id_lapak_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.lapaks_id_lapak_seq OWNED BY public.lapaks.id_lapak;
          public          postgres    false    213            �            1259    19390 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(191) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    19389    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    210            J           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    209            �            1259    19570 	   pedagangs    TABLE       CREATE TABLE public.pedagangs (
    id_pedagang bigint NOT NULL,
    nik character varying(16) NOT NULL,
    nama_lengkap character varying(32) NOT NULL,
    no_hp character varying(13) NOT NULL,
    email character varying(32) NOT NULL,
    alamat character varying(191) NOT NULL
);
    DROP TABLE public.pedagangs;
       public         heap    postgres    false            �            1259    19569    pedagangs_id_pedagang_seq    SEQUENCE     �   CREATE SEQUENCE public.pedagangs_id_pedagang_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.pedagangs_id_pedagang_seq;
       public          postgres    false    212            K           0    0    pedagangs_id_pedagang_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.pedagangs_id_pedagang_seq OWNED BY public.pedagangs.id_pedagang;
          public          postgres    false    211            �            1259    19613    produks    TABLE       CREATE TABLE public.produks (
    id_produk bigint NOT NULL,
    nama_produk character varying(191) NOT NULL,
    harga_lama double precision DEFAULT '0'::double precision NOT NULL,
    harga_terbaru double precision NOT NULL,
    url_gambar character varying(191) NOT NULL
);
    DROP TABLE public.produks;
       public         heap    postgres    false            �            1259    19612    produks_id_produk_seq    SEQUENCE     ~   CREATE SEQUENCE public.produks_id_produk_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.produks_id_produk_seq;
       public          postgres    false    220            L           0    0    produks_id_produk_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.produks_id_produk_seq OWNED BY public.produks.id_produk;
          public          postgres    false    219            �            1259    19635 
   retribusis    TABLE     �   CREATE TABLE public.retribusis (
    id_retribusi bigint NOT NULL,
    layanan character varying(191) NOT NULL,
    biaya_awal double precision NOT NULL,
    kenaikan_biaya double precision DEFAULT '0'::double precision NOT NULL
);
    DROP TABLE public.retribusis;
       public         heap    postgres    false            �            1259    19634    retribusis_id_retribusi_seq    SEQUENCE     �   CREATE SEQUENCE public.retribusis_id_retribusi_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.retribusis_id_retribusi_seq;
       public          postgres    false    223            M           0    0    retribusis_id_retribusi_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.retribusis_id_retribusi_seq OWNED BY public.retribusis.id_retribusi;
          public          postgres    false    222            �            1259    19594    sewas    TABLE     s  CREATE TABLE public.sewas (
    id_sewa bigint NOT NULL,
    harga_awal double precision NOT NULL,
    kenaikan_harga double precision DEFAULT '0'::double precision NOT NULL,
    periode integer NOT NULL,
    status boolean DEFAULT false NOT NULL,
    id_pedagang bigint NOT NULL,
    id_lapak bigint NOT NULL,
    tanggal_sewa timestamp(0) without time zone NOT NULL
);
    DROP TABLE public.sewas;
       public         heap    postgres    false            �            1259    19593    sewas_id_sewa_seq    SEQUENCE     z   CREATE SEQUENCE public.sewas_id_sewa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.sewas_id_sewa_seq;
       public          postgres    false    218            N           0    0    sewas_id_sewa_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.sewas_id_sewa_seq OWNED BY public.sewas.id_sewa;
          public          postgres    false    217            �            1259    19642    transaksi_retribusi    TABLE     -  CREATE TABLE public.transaksi_retribusi (
    kode_pembayaran character varying(191) NOT NULL,
    id_sewa bigint NOT NULL,
    jumlah_bayar double precision NOT NULL,
    status boolean DEFAULT false NOT NULL,
    token text NOT NULL,
    tanggal_transaksi timestamp(0) without time zone NOT NULL
);
 '   DROP TABLE public.transaksi_retribusi;
       public         heap    postgres    false            �            1259    19620    transaksi_sewa    TABLE     j  CREATE TABLE public.transaksi_sewa (
    kode_pembayaran character varying(191) NOT NULL,
    id_sewa bigint NOT NULL,
    jumlah_bayar double precision NOT NULL,
    token text NOT NULL,
    status boolean DEFAULT false NOT NULL,
    keterangan text DEFAULT 'menunggu pembayaran'::text NOT NULL,
    tanggal_transaksi timestamp(0) without time zone NOT NULL
);
 "   DROP TABLE public.transaksi_sewa;
       public         heap    postgres    false            �           2604    19588    artikels id_artikel    DEFAULT     z   ALTER TABLE ONLY public.artikels ALTER COLUMN id_artikel SET DEFAULT nextval('public.artikels_id_artikel_seq'::regclass);
 B   ALTER TABLE public.artikels ALTER COLUMN id_artikel DROP DEFAULT;
       public          postgres    false    215    216    216            �           2604    19580    lapaks id_lapak    DEFAULT     r   ALTER TABLE ONLY public.lapaks ALTER COLUMN id_lapak SET DEFAULT nextval('public.lapaks_id_lapak_seq'::regclass);
 >   ALTER TABLE public.lapaks ALTER COLUMN id_lapak DROP DEFAULT;
       public          postgres    false    214    213    214            �           2604    19393    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209    210            �           2604    19573    pedagangs id_pedagang    DEFAULT     ~   ALTER TABLE ONLY public.pedagangs ALTER COLUMN id_pedagang SET DEFAULT nextval('public.pedagangs_id_pedagang_seq'::regclass);
 D   ALTER TABLE public.pedagangs ALTER COLUMN id_pedagang DROP DEFAULT;
       public          postgres    false    212    211    212            �           2604    19616    produks id_produk    DEFAULT     v   ALTER TABLE ONLY public.produks ALTER COLUMN id_produk SET DEFAULT nextval('public.produks_id_produk_seq'::regclass);
 @   ALTER TABLE public.produks ALTER COLUMN id_produk DROP DEFAULT;
       public          postgres    false    220    219    220            �           2604    19638    retribusis id_retribusi    DEFAULT     �   ALTER TABLE ONLY public.retribusis ALTER COLUMN id_retribusi SET DEFAULT nextval('public.retribusis_id_retribusi_seq'::regclass);
 F   ALTER TABLE public.retribusis ALTER COLUMN id_retribusi DROP DEFAULT;
       public          postgres    false    222    223    223            �           2604    19597    sewas id_sewa    DEFAULT     n   ALTER TABLE ONLY public.sewas ALTER COLUMN id_sewa SET DEFAULT nextval('public.sewas_id_sewa_seq'::regclass);
 <   ALTER TABLE public.sewas ALTER COLUMN id_sewa DROP DEFAULT;
       public          postgres    false    218    217    218            9          0    19585    artikels 
   TABLE DATA           e   COPY public.artikels (id_artikel, judul, deskripsi, link, waktu_terbit, waktu_perubahan) FROM stdin;
    public          postgres    false    216   �K       7          0    19577    lapaks 
   TABLE DATA           L   COPY public.lapaks (id_lapak, posisi, luas, harga_sewa, status) FROM stdin;
    public          postgres    false    214   L       3          0    19390 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    210   lL       5          0    19570 	   pedagangs 
   TABLE DATA           Y   COPY public.pedagangs (id_pedagang, nik, nama_lengkap, no_hp, email, alamat) FROM stdin;
    public          postgres    false    212   M       =          0    19613    produks 
   TABLE DATA           `   COPY public.produks (id_produk, nama_produk, harga_lama, harga_terbaru, url_gambar) FROM stdin;
    public          postgres    false    220   �M       @          0    19635 
   retribusis 
   TABLE DATA           W   COPY public.retribusis (id_retribusi, layanan, biaya_awal, kenaikan_biaya) FROM stdin;
    public          postgres    false    223   @N       ;          0    19594    sewas 
   TABLE DATA           z   COPY public.sewas (id_sewa, harga_awal, kenaikan_harga, periode, status, id_pedagang, id_lapak, tanggal_sewa) FROM stdin;
    public          postgres    false    218   |N       A          0    19642    transaksi_retribusi 
   TABLE DATA           w   COPY public.transaksi_retribusi (kode_pembayaran, id_sewa, jumlah_bayar, status, token, tanggal_transaksi) FROM stdin;
    public          postgres    false    224   �N       >          0    19620    transaksi_sewa 
   TABLE DATA           ~   COPY public.transaksi_sewa (kode_pembayaran, id_sewa, jumlah_bayar, token, status, keterangan, tanggal_transaksi) FROM stdin;
    public          postgres    false    221   �N       O           0    0    artikels_id_artikel_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.artikels_id_artikel_seq', 1, false);
          public          postgres    false    215            P           0    0    lapaks_id_lapak_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.lapaks_id_lapak_seq', 5, true);
          public          postgres    false    213            Q           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 24, true);
          public          postgres    false    209            R           0    0    pedagangs_id_pedagang_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.pedagangs_id_pedagang_seq', 2, true);
          public          postgres    false    211            S           0    0    produks_id_produk_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.produks_id_produk_seq', 5, true);
          public          postgres    false    219            T           0    0    retribusis_id_retribusi_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.retribusis_id_retribusi_seq', 2, true);
          public          postgres    false    222            U           0    0    sewas_id_sewa_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.sewas_id_sewa_seq', 2, true);
          public          postgres    false    217            �           2606    19592    artikels artikels_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.artikels
    ADD CONSTRAINT artikels_pkey PRIMARY KEY (id_artikel);
 @   ALTER TABLE ONLY public.artikels DROP CONSTRAINT artikels_pkey;
       public            postgres    false    216            �           2606    19583    lapaks lapaks_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.lapaks
    ADD CONSTRAINT lapaks_pkey PRIMARY KEY (id_lapak);
 <   ALTER TABLE ONLY public.lapaks DROP CONSTRAINT lapaks_pkey;
       public            postgres    false    214            �           2606    19395    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    210            �           2606    19575    pedagangs pedagangs_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.pedagangs
    ADD CONSTRAINT pedagangs_pkey PRIMARY KEY (id_pedagang);
 B   ALTER TABLE ONLY public.pedagangs DROP CONSTRAINT pedagangs_pkey;
       public            postgres    false    212            �           2606    19619    produks produks_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.produks
    ADD CONSTRAINT produks_pkey PRIMARY KEY (id_produk);
 >   ALTER TABLE ONLY public.produks DROP CONSTRAINT produks_pkey;
       public            postgres    false    220            �           2606    19641    retribusis retribusis_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.retribusis
    ADD CONSTRAINT retribusis_pkey PRIMARY KEY (id_retribusi);
 D   ALTER TABLE ONLY public.retribusis DROP CONSTRAINT retribusis_pkey;
       public            postgres    false    223            �           2606    19601    sewas sewas_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.sewas
    ADD CONSTRAINT sewas_pkey PRIMARY KEY (id_sewa);
 :   ALTER TABLE ONLY public.sewas DROP CONSTRAINT sewas_pkey;
       public            postgres    false    218            �           2606    19654 ,   transaksi_retribusi transaksi_retribusi_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.transaksi_retribusi
    ADD CONSTRAINT transaksi_retribusi_pkey PRIMARY KEY (kode_pembayaran);
 V   ALTER TABLE ONLY public.transaksi_retribusi DROP CONSTRAINT transaksi_retribusi_pkey;
       public            postgres    false    224            �           2606    19633 "   transaksi_sewa transaksi_sewa_pkey 
   CONSTRAINT     m   ALTER TABLE ONLY public.transaksi_sewa
    ADD CONSTRAINT transaksi_sewa_pkey PRIMARY KEY (kode_pembayaran);
 L   ALTER TABLE ONLY public.transaksi_sewa DROP CONSTRAINT transaksi_sewa_pkey;
       public            postgres    false    221            �           2606    19607    sewas sewas_id_lapak_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.sewas
    ADD CONSTRAINT sewas_id_lapak_foreign FOREIGN KEY (id_lapak) REFERENCES public.lapaks(id_lapak);
 F   ALTER TABLE ONLY public.sewas DROP CONSTRAINT sewas_id_lapak_foreign;
       public          postgres    false    214    3222    218            �           2606    19602    sewas sewas_id_pedagang_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.sewas
    ADD CONSTRAINT sewas_id_pedagang_foreign FOREIGN KEY (id_pedagang) REFERENCES public.pedagangs(id_pedagang);
 I   ALTER TABLE ONLY public.sewas DROP CONSTRAINT sewas_id_pedagang_foreign;
       public          postgres    false    212    218    3220            �           2606    19648 7   transaksi_retribusi transaksi_retribusi_id_sewa_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.transaksi_retribusi
    ADD CONSTRAINT transaksi_retribusi_id_sewa_foreign FOREIGN KEY (id_sewa) REFERENCES public.sewas(id_sewa);
 a   ALTER TABLE ONLY public.transaksi_retribusi DROP CONSTRAINT transaksi_retribusi_id_sewa_foreign;
       public          postgres    false    224    3226    218            �           2606    19627 -   transaksi_sewa transaksi_sewa_id_sewa_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.transaksi_sewa
    ADD CONSTRAINT transaksi_sewa_id_sewa_foreign FOREIGN KEY (id_sewa) REFERENCES public.sewas(id_sewa);
 W   ALTER TABLE ONLY public.transaksi_sewa DROP CONSTRAINT transaksi_sewa_id_sewa_foreign;
       public          postgres    false    218    221    3226            9      x������ � �      7   H   x�%̻�PC�����؁����/0i\�7q�'"��o�JV��X�;e�eD�{�Q������^��      3   �   x�]�Q
�0E�o��23I��0�5HP�$�_[M�?���,�ah���gp�/��A�!r�nr*l��ج'Yd,h{���L%$?����d�&���	��^�Z\ :���  � s܏�o���O��Q�:�K�wk�EԜ�2Z���3z,v��)���hu      5   �   x����
�0E痯�Hy�M��Tq��ri44)����-v�;��=�T�Sl�a͊Yk:�)��=��$���1�X[�5��Xi���G���H-�{&��W� [d��tĀ�\P��BA�~�w�R�ц��S�UB�7��;<      =   x   x�=ν� ��<O@
��������ĠD����+5���ߦj�h��sm0�V���H��F��̆���e�0E���9���R<(&s�
6���`]���M��A��7 f)�      @   ,   x�3��NM�M�K��42 N.#�PRjQqfP�*���� 0
�      ;   B   x�]ʻ�0D�x�
0z�� \1п�D�&��	Y�r1v�(ԍ1���2�5t�����J\{D�      A      x������ � �      >   �   x�e���0 г3E0r�8����m\@�-*T��+,�޺���O�4�IR!	���"Oj^-��V1�d�Aˤ:R-����mg�_�(����>R/ѭC	��,s���Yce����lU��f�	f[��tڻ�̓�t��'�����{x959     