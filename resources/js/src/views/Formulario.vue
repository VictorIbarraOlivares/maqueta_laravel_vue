<template>
    <div>
        <h4>Formulario</h4>
        <el-form ref="form" :model="form" label-position="top" :rules="rules">
            <el-row :gutter="20">

                <el-col :span="16">
                    <el-card class="mt-4" >

                        <el-row :gutter="20">
                            <el-col :span="6">
                                <el-form-item label="Fecha Documento" prop="fecha_documento">
                                    <el-date-picker 
                                        type="date" 
                                        v-model="form.fecha_documento" 
                                        :value="form.fecha_documento" 
                                        format="dd-MM-yyyy"
                                        style="width: 100%;"
                                        >
                                    </el-date-picker>
                                </el-form-item>
                            </el-col>

                            <el-col :span="12">
                                <el-form-item label="Proveedor">
                                    <el-input v-model="form.proveedor" ></el-input>
                                </el-form-item>
                            </el-col>

                        </el-row>

                        <el-row :gutter="20">
                            <el-col :span="6">
                                <el-form-item label="Tipo Documento" prop="tipo_documento">
                                    <el-select v-model="form.tipo_documento" placeholder="Por favor seleccione">
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="N° Documento" prop="numero_documento">
                                    <el-input v-model="form.numero_documento" ></el-input>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="Orden de Compra" prop="orden_de_compra">
                                    <el-input v-model="form.orden_de_compra" ></el-input>
                                </el-form-item>
                            </el-col>

                            <el-col :span="6">
                                <el-form-item label="Monto Total" prop="monto_total">
                                    <el-input v-model="form.monto_total" placeholder="IVA incluido"  ></el-input>
                                </el-form-item>
                            </el-col>

                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Observación">
                                    <el-input type="textarea" v-model="form.observacion"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </el-card>
                </el-col>

                <el-col :span="8">
                    <el-card class="mt-4" >

                        <el-row >
                            <el-col :span="12">
                                <el-form-item label="Fecha Recepción">
                                    <el-date-picker 
                                        type="date" 
                                        v-model="form.fecha_recepcion" 
                                        :value="form.fecha_recepcion" 
                                        format="dd-MM-yyyy"
                                        style="width: 100%;"
                                        >
                                    </el-date-picker>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Centro de Salud">
                                    <el-select v-model="form.centro_salud" placeholder="Por favor seleccione" style="width: 100%;">
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value" >
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <el-row >
                            <el-col :span="24">
                                <el-form-item label="Responsable Recepción">
                                    <el-select v-model="form.responsable_recepcion" placeholder="Por favor seleccione" style="width: 100%;" >
                                        <el-option
                                            v-for="item in options"
                                            :key="item.value"
                                            :label="item.label"
                                            :value="item.value">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>

                    </el-card>
                </el-col>

            </el-row>

            <el-row :gutter="20">

                <el-col :span="16">
                    <el-card class="mt-4" >
                        <div slot="header" class="clearfix">
                            <span>Adjuntar archivos de respaldo de recepción original, que incluya al menos una identificación del responsable</span>
                        </div>

                        <el-row :gutter="20">
                            <el-col :span="24">

                                <el-upload
                                    class="upload-demo"
                                    action="/test"
                                    :auto-upload="false"
                                    :on-preview="handlePreview"
                                    :on-remove="handleRemove"
                                    accept=".pdf"
                                    multiple
                                    :limit="3"
                                    :on-exceed="handleExceed"
                                    :file-list="fileList" >
                                    <el-button size="small" type="primary">Clic para subir archivo</el-button>
                                    <div slot="tip" class="el-upload__tip">Solo archivos pdf con un tamaño menor de 500kb. Máximo 3 archivos.</div>
                                </el-upload>

                            </el-col>
                        </el-row>

                    </el-card>
                </el-col>

                <el-col :span="8">
                    <el-form-item class="mt-4" >
                        <el-button type="primary" @click.prevent="submitForm('form')" ><i class="el-icon-s-claim"></i> Guardar</el-button>
                    </el-form-item>
                </el-col>

            </el-row>
        </el-form>

    </div>
</template>

<script>

export default {
  data () {
    return {
        form: {
            tipo_documento: '',
            numero_documento: '',
            fecha_documento: new Date().toISOString().slice(0,10),
            fecha_recepcion: '',
            orden_de_compra: '',
            monto_total: '',
            proveedor: '',
        },
        options: [
            {
            value: '1', // id
            label: 'Guía de Despacho'
            }, {
            value: '2',
            label: 'Cedible'
            }
        ],
        fileList: [
            {name: 'recepción_timbrada.pdf', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}, 
            {name: 'copia_dte.pdf', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}
        ],

        rules: {
            fecha_documento: [
                { type: 'date', required: true, message: 'Ingrese una fecha', trigger: 'change' }
            ],
            tipo_documento: [
                { required: true, message: 'Debe seleccionar uno', trigger:'change' }
            ],
            numero_documento: [
                { required: true, message: 'Ingrese el número del documento', trigger:'blur' },
                { type: 'number', message: 'Debe ser un número', trigger:'blur' }
            ],
            orden_de_compra: [
                { required: true, message: 'Ingrese la orden de compra del documento', trigger:'blur' },
            ],
            monto_total: [
                { required: true, message: 'Ingrese el monto del documento', trigger:'blur' },
                { type: 'number', message: 'Debe ser un número', trigger:'blur' }
            ],
        }
    }
  },
  methods: {
    submitForm(formName) {

          this.$refs[formName].validate((valid) => {
          if (valid) {
            alert('submit!');
          } else {
            console.log('error submit!!');
            return false;
          }
        });

        // this.$validator.validateAll().then(result => {
        //     if(result) {
        //         // if form have no errors
        //         alert("formulario enviado!");
        //     }else{
        //         // form have errors
        //     }
        // });

    },
    handleRemove(file, fileList) {
        console.log(file, fileList);
    },
    handlePreview(file) {
        console.log(file);
    },
    handleExceed(files, fileList) {
        this.$message.warning(`El límite es 3, haz seleccionado ${files.length} archivos esta vez, añade hasta ${files.length + fileList.length}`);
    }
  },
  mounted() {
      
    console.log('fecha');
    console.log(this.form.fecha_documento);
    console.log( new Date().toISOString().slice(0,10) );
      
  },
}

</script>