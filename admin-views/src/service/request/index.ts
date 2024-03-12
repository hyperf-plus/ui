import CustomAxiosInstance from "@/service/request/instance"
import config from "./config"
import amisConfig from "./amis"

export const request = new CustomAxiosInstance(config).instance
export const requestAmis = new CustomAxiosInstance(amisConfig).instance
