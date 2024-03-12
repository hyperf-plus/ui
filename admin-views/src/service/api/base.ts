import {request,requestAmis} from "../request"

/**
 * 初始化页面结构
 * @param path
 */
export const initPageSchema = function(path: string){
    return request.get(path,{
        headers:{
                "layout":true
        }
    })
}

/**
 * amis请求
 * @param url
 * @param method
 * @param data
 */
export const amisRequest = (url, method, data) => requestAmis[method](url, data)

/**
 * 获取设置
 */
export const fetchSettings = () => request.get("/setting/config")

/**
 * 保存设置
 * @param data 格式：{key1: value1, key2: value2, ...}
 */
export const saveSettings = (data: any) => request.put("/setting", data)
