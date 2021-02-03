import { Database } from '@vuex-orm/core'
import Auth from '@/models/Auth'
import User from '@/models/User'
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Plant from '@/models/Plant'
import PlantType from '@/models/PlantType'
import PlantStage from '@/models/PlantStage'
import Plague from '@/models/Plague'
import PlagueType from '@/models/PlagueType'
import PlantPlague from '@/models/PlantPlague'
import PlantPartsAnatomy from '@/models/PlantPartsAnatomy'
import PlaguePlantsPartsAnatomy from '@/models/PlaguePlantsPartsAnatomy'
import Company from '@/models/Company'

import Crop from '@/models/Crop'
import CropPlague from '@/models/CropPlague'

import Product from '@/models/Product'
import ProductComposition from '@/models/ProductComposition'
import ProductType from '@/models/ProductType'
import Device from '@/models/Device'
import DeviceType from '@/models/DeviceType'

import CurrentWeather from '@/models/CurrentWeather'
import DailyWeather from '@/models/DailyWeather'

import AirData from '@/models/AirData'
import SoilData from '@/models/SoilData'

import SoilType from '@/models/SoilType'
import AnalyseSoil from '@/models/AnalyseSoil'
import AnalyseSoilGuideline from '@/models/AnalyseSoilGuideline'


import Harvest from '@/models/Harvest'

const database = new Database()

database.register(User)
database.register(Auth)
database.register(Terrain) 
database.register(Farm)

database.register(Plant)
database.register(PlantType)
database.register(PlantStage)

database.register(Plague)
database.register(PlagueType)

database.register(PlantPlague)
database.register(PlantPartsAnatomy)
database.register(PlaguePlantsPartsAnatomy)

database.register(Product)
database.register(ProductComposition)
database.register(ProductType)

database.register(Company)

database.register(Crop)
database.register(CropPlague)

database.register(DeviceType)
database.register(Device)

database.register(CurrentWeather)
database.register(DailyWeather)

database.register(AirData)
database.register(SoilData)

database.register(SoilType)
database.register(AnalyseSoil)
database.register(AnalyseSoilGuideline)

database.register(Harvest)

export default database   

