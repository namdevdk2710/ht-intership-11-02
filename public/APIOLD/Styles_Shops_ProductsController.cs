using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Data.Entity.Infrastructure;
using System.Data.SqlClient;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Web.Http.Description;
using MusicAPIStore.Context;
using MusicAPIStore.Filters;
using MusicAPIStore.Models;

namespace MusicAPIStore.Controllers
{
    [APIAPPAuthorizeAttribute]
    public class Styles_Shops_ProductsController : ApiController
    {
        private DatabaseContext db = new DatabaseContext();

        // GET: api/Styles_Shops_Products
        //[HttpGet]
        //[Route("api/GetStyles_Users_Search_Keys/{idCatalog}")]
        public List<Styles_Shops_Products> GetStyles_Shops_Products(int idCatalog)
        {
            try
            {
                var list = db.Styles_Shops_Products.Where(d => d.ID_Catalog == idCatalog).ToList();
                foreach (Styles_Shops_Products d in list)
                {
                    d.Image = "Thumb.ashx?s=400&file=/" + d.Image;
                }
                return list;
            }
            catch (System.Exception)
            {
                throw;
            }
        }

        // GET: api/Styles_Shops_Products/5
        [ResponseType(typeof(Styles_Shops_Products))]
        public IHttpActionResult GetStyles_Shops_Products(int id, int idcatalog)
        {
            Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(id);
            if (styles_Shops_Products == null)
            {
                return NotFound();
            }

            return Ok(styles_Shops_Products);
        }

        // PUT: api/Styles_Shops_Products/5
        [ResponseType(typeof(void))]
        public IHttpActionResult PutStyles_Shops_Products(int id, Styles_Shops_Products styles_Shops_Products)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            if (id != styles_Shops_Products.ID_Product)
            {
                return BadRequest();
            }

            db.Entry(styles_Shops_Products).State = EntityState.Modified;

            try
            {
                db.SaveChanges();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!Styles_Shops_ProductsExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return StatusCode(HttpStatusCode.NoContent);
        }



        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }

        private bool Styles_Shops_ProductsExists(int id)
        {
            return db.Styles_Shops_Products.Count(e => e.ID_Product == id) > 0;
        }


        //Chi tiết sản phẩm Mạnh viết 2/3/2019
        // GET: api/GetStyles_Shops_Products/Detail/Popup/{idProduct}
        [HttpGet]
        [Route("api/GetStyles_Shops_Products/Detail/Popup/{idProduct}")]
        public HttpResponseMessage GetStyles_Shops_Products_Popup(int idProduct)
        {
            try
            {
                var list = db.Styles_Shops_Products.Where(e => e.ID_Product == idProduct).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Chi tiết sản phẩm
        // GET: api/GetStyles_Shops_Products/Detail/{idProduct}/{lang}
        [HttpGet]
        [Route("api/GetStyles_Shops_Products/Detail/{idProduct}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Product(int idProduct, string lang)
        {
            try
            {
                var list = db.Database.SqlQuery<Styles_Shops_Products_Detail>(@"[dbo].[st_AUC_Get_Shops_Details] 
                    @ID_Key,                     
                    @LanguageCode",
                   new SqlParameter("ID_Key", idProduct),
                   new SqlParameter("LanguageCode", lang)
                   ).ToList();

                foreach (Styles_Shops_Products_Detail d in list)
                {
                    if (d.ServiceOrProduct == true)
                    {
                        if (d.PriceType.ToString() == "s")
                        {
                            //d.Price = d.CurrencyCode + "|||" + d.ProductDiscounts + "|||" + d.ProductPrice + "|||" + d.UnitName
                            //    + "|||" + d.MinOfQuantity;
                            d.PriceText = "";
                        }
                        else
                        {
                            if (lang == "vi")
                            {
                                d.PriceText = "Giá thương lượng";
                            }
                            else
                            {
                                d.PriceText = "Price negotiable";
                            }

                        }
                    }
                    else
                    {
                        if (d.PriceType.ToString() == "s")
                        {
                            //d.Price = d.CurrencyCode + "|||" + d.ProductDiscounts + "|||" + d.ProductPrice + "|||" + d.UnitName
                            //    + "|||" + d.MinOfQuantity;
                            d.PriceText = "";
                        }
                        else
                        {
                            var Maxprice = db.Styles_Shops_Product_Prices.Where(e => e.ID_Product == d.ID_Product).Select(e => e.Price).Max();
                            var Minprice = db.Styles_Shops_Product_Prices.Where(e => e.ID_Product == d.ID_Product).Select(e => e.Price).Min();
                            d.ProductDiscounts = Minprice;
                            d.ProductPrice = Maxprice;
                        }
                    }


                }
                ////Cập nhập danh sách sản phẩm đã xem
                //Cls_Users updateUser = Cls_Users.getOject_Key((Session["WebsiteUser"] as Cls_Users).ID_User);
                //updateUser.ID_User_find = updateUser.ID_User;
                //updateUser.ListProductViewed = updateUser.ListProductViewed + "," + id;
                //updateUser.ListProductViewed = updateUser.ListProductViewed.TrimStart(',');
                //updateUser.doUpdate();
                //Styles_Users update = db.Styles_Shops_Products.Find(idProduct);
                //update. = true;
                //db.Entry(update).State = EntityState.Modified;
                //db.SaveChanges();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }
        //Chi tiết sản phẩm
        // GET: api/GetStyles_Shops_Products/Detail/{idProduct}/{idUser}/{lang}
        [HttpGet]
        [Route("api/GetStyles_Shops_Products/Detail/{idProduct}/{idUser}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Product(int idProduct, int idUser, string lang)
        {
            try
            {
                var list = db.Database.SqlQuery<Styles_Shops_Products_Detail>(@"[dbo].[st_AUC_Get_Shops_Details] 
                    @ID_Key,                     
                    @LanguageCode",
                   new SqlParameter("ID_Key", idProduct),
                   new SqlParameter("LanguageCode", lang)
                   ).ToList();

                foreach (Styles_Shops_Products_Detail d in list)
                {
                    if (d.ServiceOrProduct == true)
                    {
                        if (d.PriceType.ToString() == "s")
                        {
                            //d.Price = d.CurrencyCode + "|||" + d.ProductDiscounts + "|||" + d.ProductPrice + "|||" + d.UnitName
                            //    + "|||" + d.MinOfQuantity;
                            d.PriceText = "";
                        }
                        else
                        {
                            if (lang == "vi")
                            {
                                d.PriceText = "Giá thương lượng";
                            }
                            else
                            {
                                d.PriceText = "Price negotiable";
                            }

                        }
                    }
                    else
                    {
                        if (d.PriceType.ToString() == "s")
                        {
                            //d.Price = d.CurrencyCode + "|||" + d.ProductDiscounts + "|||" + d.ProductPrice + "|||" + d.UnitName
                            //    + "|||" + d.MinOfQuantity;
                            d.PriceText = "";
                        }
                        else
                        {
                            var Maxprice = db.Styles_Shops_Product_Prices.Where(e => e.ID_Product == d.ID_Product).Select(e => e.Price).Max();
                            var Minprice = db.Styles_Shops_Product_Prices.Where(e => e.ID_Product == d.ID_Product).Select(e => e.Price).Min();
                            d.ProductDiscounts = Minprice;
                            d.ProductPrice = Maxprice;
                        }
                    }


                }
                ////Cập nhập danh sách sản phẩm đã xem
                //Cls_Users updateUser = Cls_Users.getOject_Key((Session["WebsiteUser"] as Cls_Users).ID_User);
                //updateUser.ID_User_find = updateUser.ID_User;
                //updateUser.ListProductViewed = updateUser.ListProductViewed + "," + id;
                //updateUser.ListProductViewed = updateUser.ListProductViewed.TrimStart(',');
                //updateUser.doUpdate();
                if (idUser != 0)
                {
                    Styles_Users update = db.Styles_Users.Find(idUser);
                    if (!update.ListProductViewed.Contains(idProduct.ToString()))
                    {
                        update.ListProductViewed = update.ListProductViewed + "," + idProduct;
                        db.Entry(update).State = EntityState.Modified;
                        db.SaveChanges();
                    }


                }
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }
        //Đơn vị cung cấp
        public string getSupplyAbilityTime(object SupplyAbilityTime, object lang)
        {
            string str = SupplyAbilityTime.ToString();
            string result = "";
            if (lang.ToString() == "vi")
            {
                switch (str)
                {
                    case "D":
                        result = "Ngày";
                        break;

                    case "Q":
                        result = "Quý";
                        break;
                    case "W":
                        result = "Tuần";
                        break;
                    case "M":
                        result = "Tháng";
                        break;
                    case "Y":
                        result = "Năm";
                        break;
                }
            }
            else
            {
                switch (str)
                {
                    case "D":
                        result = "Day";
                        break;

                    case "Q":
                        result = "Quarter";
                        break;
                    case "W":
                        result = "Week";
                        break;
                    case "M":
                        result = "Month";
                        break;
                    case "Y":
                        result = "Year";
                        break;
                }
            }

            return result;
        }

        // Thông tin nhanh chi tiết sản phẩm
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_ServiceInfo/Detail/{idProduct}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Products_ServiceInfo(int idProduct, string lang)
        {
            try
            {
                var list = db.Database.SqlQuery<Styles_Shops_Products_ServiceInfo>(@"[dbo].[st_AUC_Get_Shops_Details] 
                    @ID_Key,                     
                    @LanguageCode",
                   new SqlParameter("ID_Key", idProduct),
                   new SqlParameter("LanguageCode", lang)
                   ).ToList();

                foreach (Styles_Shops_Products_ServiceInfo d in list)
                {
                    d.SupplyAbilityTime = getSupplyAbilityTime(d.SupplyAbilityTime, lang);
                    if (d.ListShippingOption.ToString() == "") continue;
                    string[] ListShippingOption = d.ListShippingOption.ToString().Split(',');
                    string ShippingTemp = "";
                    for (int i = 0; i < ListShippingOption.Length; i++)
                    {
                        if (ListShippingOption[i].ToString() != "0")
                        {
                            var ID_Shipping = ListShippingOption[i].ToString();
                            var Name = from c in db.Styles_Shops_Shippings_Translation
                                       where c.LanguageCode == lang && c.ID_Shipping.ToString() == ID_Shipping
                                       select c.ShippingName;
                            if (Name.ToList().Count > 0)
                            {
                                var a = Name.FirstOrDefault();
                                ShippingTemp += "," + a;
                            }
                        }
                    }
                    d.ListShippingOption = ShippingTemp.TrimStart(',');
                }

                foreach (Styles_Shops_Products_ServiceInfo d in list)
                {
                    if (d.ListPaymentOption.ToString() == "") continue;
                    string[] ListPaymentOption = d.ListPaymentOption.ToString().Split(',');
                    string PaymentTemp = "";
                    for (int i = 0; i < ListPaymentOption.Length; i++)
                    {
                        if (ListPaymentOption[i].ToString() != "0")
                        {
                            var ID_Payment = ListPaymentOption[i].ToString();
                            var Name = from c in db.Styles_Shops_Payments_Translation
                                       where c.LanguageCode == lang && c.ID_Payment.ToString() == ID_Payment
                                       select c.PaymentName;

                            if (Name.ToList().Count > 0)
                            {
                                var a = Name.FirstOrDefault();
                                PaymentTemp += "," + a;
                            }

                        }
                    }
                    d.ListPaymentOption = PaymentTemp.TrimStart(',');
                }

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Tính năng chi tiết sẩn phẩm
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Features/Detail/{idProduct}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Products_Features(int idProduct, string lang)
        {
            try
            {
                var list = db.Database.SqlQuery<Styles_Shops_Products_Features>(@"[dbo].[st_AUC_List_Feature_With_Product_Detail_Full] 
                    @ID_Key,                     
                    @LanguageCode",
                   new SqlParameter("ID_Key", idProduct),
                   new SqlParameter("LanguageCode", lang)
                   ).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        [HttpGet]
        [Route("api/GetStyles_Shops_Products_CustomInfor/Detail/{idProduct}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Products_CustomInfor(int idProduct, string lang)
        {
            try
            {
                var list = db.Database.SqlQuery<Styles_Shops_Products_CustomInfor>(@"[dbo].[st_AUC_List_CustomInfor_With_Product_Detail] 
                    @ID_Key,                     
                    @LanguageCode",
                   new SqlParameter("ID_Key", idProduct),
                   new SqlParameter("LanguageCode", lang)
                   ).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }



        //Thông tin gian hàng
        // GET: GetStyles_Shops_Product_Store_Infor/{idProduct}
        [HttpGet]
        [Route("api/GetStyles_Shops_Product_Store_Infor/{idProduct}")]
        public HttpResponseMessage GetStyles_Shops_Product_Store_Infor(int idProduct)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int UserName = Convert.ToInt32(styles_Shops_Products.UserName);
                var list =
                (
                    from u in db.Styles_Users
                    where u.ID_User == UserName
                    select new
                    {
                        Logo = u.Logo,
                        CompanyName = u.CompanyName
                    }
                ).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Sản phẩm liên quan
        // GET: api/GetStyles_Shops_Products_Relates/{idProduct}/{top}
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Relates/{idProduct}/{top}")]
        public HttpResponseMessage GetStyles_Shops_Products_Relates(int idProduct, int top)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int idCate = Convert.ToInt32(styles_Shops_Products.ID_Catalog);
                //var list = db.Styles_Shops_Products.Where(e => (e.ID_Product != idProduct) && (e.ID_Catalog == idCate)).ToList();
                var list =
                    (from product in db.Styles_Shops_Products
                     where product.ID_Product != idProduct && product.ID_Catalog == idCate
                     select product
                     ).Take(top).ToList();


                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        public string getCatalogByID(int ID_Catalog)
        {
            int idCate = Convert.ToInt32(ID_Catalog);
            string ListChild = db.Database.SqlQuery<ModelListChildCatalog>(@"Select ListChild from Styles_Shops_Catalogs where ID_Parent = 0 and (ListChild like ('%|' + '" + idCate + "' + '|%') or ListChild like ('' + '" + idCate + "' + '|%') or ListChild like ('%|' + '" + idCate + "' + ''))  ").FirstOrDefault().ListChild.ToString();
            return ListChild;
        }

        public class ModelListChildCatalog
        {
            public string ListChild { get; set; }
       
        }
        public class Styles_Shops_Products_Relates_Catalog
        {
            public int ID_Product { get; set; }
            public Nullable<System.DateTime> EditTime { get; set; }
            public Nullable<bool> ServiceOrProduct { get; set; }
            public Nullable<int> MinOfQuantity { get; set; }
            public string PriceType { get; set; }
            public Nullable<int> ID_Role { get; set; }
            public string ImageRole { get; set; }
            public string CompanyName { get; set; }
            public string CurrencyCode { get; set; }
            public string UnitName { get; set; }
            public string UserName { get; set; }
            public Nullable<int> HitsTotal { get; set; }
            public string SaleMode { get; set; }
            public Nullable<double> ProductPrice { get; set; }
            public Nullable<double> ProductDiscounts { get; set; }
            public Nullable<int> TotalLike { get; set; }
            public string Image { get; set; }
            public string ProductCode { get; set; }
            public string LinkSEOCatalog { get; set; }
            public string Link_SEO { get; set; }
            public string ProductName { get; set; }
        }
        //Sản phẩm cùng ngành hàng
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Relates_Catalog/{idProduct}/{top}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Products_Relates_Catalog(int idProduct, int top, string lang)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int idCate = Convert.ToInt32(styles_Shops_Products.ID_Catalog);
                int ID_Store = Convert.ToInt32(styles_Shops_Products.UserName);
                //string ListChild = db.Database.SqlQuery<ModelListChildCatalog>(@"Select ListChild from Styles_Shops_Catalogs where ID_Parent = 0 and (ListChild like ('%|' + '" + idCate + "' + '|%') or ListChild like ('' + '" + idCate + "' + '|%') or ListChild like ('%|' + '" + idCate + "' + ''))  ").ToString();
                string ListChild = getCatalogByID(idCate);
                ListChild = ListChild.Replace('|',',');

                var list = db.Database.SqlQuery<Styles_Shops_Products_Relates_Catalog>(@"Select Top (" + top + @") * 
        from (SELECT Styles_Shops_Products.EditTime,ServiceOrProduct,MinOfQuantity,PriceType,
        (Select ID_Role from Styles_Users as b where b.ID_User=Styles_Shops_Products.UserName) as ID_Role,
        (Select Styles_Users_Roles.Image from Styles_Users_Roles,Styles_Users as b where Styles_Users_Roles.ID_Role=b.ID_Role and b.ID_User=Styles_Shops_Products.UserName) as ImageRole,
        (Select CompanyName from Styles_Users as b where b.ID_User=Styles_Shops_Products.UserName) as CompanyName,
        (select CurrencyCode from Styles_Shops_Currencies where Styles_Shops_Currencies.ID_Currency=Styles_Shops_Products.ID_Currency) as CurrencyCode,
        (select UnitName from Styles_Shops_Units_Translation where Styles_Shops_Units_Translation.ID_Unit=Styles_Shops_Products.ID_Unit and
        Styles_Shops_Units_Translation.LanguageCode='" + lang + @"') as UnitName,UserName,HitsTotal,SaleMode,ProductPrice,ProductDiscounts,
        TotalLike,Image,ProductCode,Styles_Shops_Products_Translation.*,Styles_Shops_Catalogs_Translation.Link_SEO as LinkSEOCatalog
        from Styles_Shops_Products,Styles_Shops_Catalogs_Translation,Styles_Shops_Products_Translation 
        where Styles_Shops_Catalogs_Translation.LanguageCode='" + lang + @"' and 
        Styles_Shops_Products.ID_Product=Styles_Shops_Products_Translation.ID_Product 
        and Styles_Shops_Products_Translation.LanguageCode='" + lang + @"'
        and Styles_Shops_Products.ID_Catalog=Styles_Shops_Catalogs_Translation.ID_Catalog 
        and Styles_Shops_Products.ID_Catalog in (" + ListChild + @")  
        and cast(Styles_Shops_Products.UserName as int) <> " + ID_Store + @" and Styles_Shops_Products.Active=1 
        and Styles_Shops_Products.IsInTrash = 0 and ServiceOrProduct = 0) as a where ID_Role <> 0 order by ID_Role desc, NEWID()").ToList();

                //int idCateLast = getCatalogByID(idCate, idCate);
                //Styles_Shops_Catalogs Catalog = db.Styles_Shops_Catalogs.Find(idCateLast);
                //string ListChild = Catalog.ListChild;
                //var list =
                //    (from product in db.Styles_Shops_Products
                //     where product.ID_Product != idProduct && ListChild.Contains(product.ID_Catalog.ToString())
                //     select product
                //     ).OrderBy(x => Guid.NewGuid()).Take(top).ToList();

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Danh cho bạn
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Relates_ProductsVip/{idProduct}/{top}")]
        public HttpResponseMessage GetStyles_Shops_Products_Relates_ProductsVip(int idProduct, int top)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int idCate = Convert.ToInt32(styles_Shops_Products.ID_Catalog);
                string[] ListChild = getCatalogByID(idCate).Split('|');
               
                var list =
                  (from product in db.Styles_Shops_Products
                   join u in db.Styles_Users on product.UserName equals u.ID_User.ToString()
                   where ListChild.Contains(product.ID_Catalog.ToString()) &&
                   product.Active == true &&
                   u.ID_Role == 3 &&
                   product.IsInTrash == false &&
                   product.Active == true
                   select product).OrderBy(x => Guid.NewGuid()).Take(top).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Danh cho bạn
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Relates_ProductsBasic/{idProduct}/{top}")]
        public HttpResponseMessage GetStyles_Shops_Products_Relates_ProductsBasic(int idProduct, int top)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int idCate = Convert.ToInt32(styles_Shops_Products.ID_Catalog);

             
                string[] ListChild = getCatalogByID(idCate).Split('|');
                var list =
                  (from product in db.Styles_Shops_Products
                   join u in db.Styles_Users on product.UserName equals u.ID_User.ToString()
                   where ListChild.Contains(product.ID_Catalog.ToString()) &&
                   product.Active == true &&
                   u.ID_Role == 2 &&
                   product.IsInTrash == false &&
                   product.Active == true
                   select product).OrderBy(x => Guid.NewGuid()).Take(top).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }


        public class ModelStylesShopsAvgProductRating
        {
            public int CountRating1 { get; set; }
            public int TotalRating1 { get; set; }
            public double AvgProductRating { get; set; }

        }

        //Đánh giá tổng sản phẩm
        [HttpGet]
        [Route("api/GetStyles_Shops_Product_AvgProductRating/{idProduct}")]
        public HttpResponseMessage GetStyles_Shops_Product_AvgProductRating(int idProduct)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int UserName = Convert.ToInt32(styles_Shops_Products.UserName);
                var list = db.Database.SqlQuery<ModelStylesShopsAvgProductRating>(@"
                Select ISNULL(Count(Rating),0) as CountRating1,ISNULL(Sum(Rating),0) as TotalRating1  
                from Styles_Shops_Product_Ratings where ID_Store='" + UserName + @"' ").ToList();

                foreach (ModelStylesShopsAvgProductRating d in list)
                {
                    d.AvgProductRating = Convert.ToDouble(Math.Round(Convert.ToDouble(Convert.ToDouble(d.TotalRating1) / Convert.ToDouble(d.CountRating1)), 2));
                }

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Đánh giá chi tiết 1  sản phẩm
        [HttpGet]
        [Route("api/GetStyles_Shops_Product_Detail_AvgProductRating/{idProduct}")]
        public HttpResponseMessage GetStyles_Shops_Product_Detail_AvgProductRating(int idProduct)
        {
            try
            {
                var list = db.Database.SqlQuery<ModelStylesShopsAvgProductRating>(@"
                Select ISNULL(Count(Rating),0) as CountRating1,ISNULL(Sum(Rating),0) as TotalRating1  
                from Styles_Shops_Product_Ratings where ID_Product =" + idProduct + @" ").ToList();

                foreach (ModelStylesShopsAvgProductRating d in list)
                {
                    d.AvgProductRating = Convert.ToDouble(Math.Round(Convert.ToDouble(Convert.ToDouble(d.TotalRating1) / Convert.ToDouble(d.CountRating1)), 2));
                }

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }


        public class ModelStylesShopsAvgReply
        {
            public int AvgReplyTime { get; set; }
            public double resultAvgReplyTime { get; set; }
        }

        //Thời gian trả lời
        [HttpGet]
        [Route("api/GetStyles_Shops_Product_AvgReply/{idProduct}")]
        public HttpResponseMessage GetStyles_Shops_Product_AvgReply(int idProduct)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int idStore = Convert.ToInt32(styles_Shops_Products.UserName);
                var list = db.Database.SqlQuery<ModelStylesShopsAvgReply>(@"
                select isNull(AVG(DATEDIFF(SECOND, AddTime,ReadTime)),0) 
                as AvgReplyTime 
                from Styles_Users_Messages 
                where ID_Sender in (Select ID_User 
                from (select d.ID_User,(Select count(ID) 
                from Styles_Users_Messages 
                where ID_Sender = " + idStore.ToString() + @"
                and ID_Receiver=d.ID_User) as CountMessage 
                from (select distinct ID_User 
                from (select ID_Sender as ID_User 
                from Styles_Users_Messages where ID_Receiver=" + idStore.ToString() + @") as t) as d) as a 
                where CountMessage>0) and ID_Receiver=" + idStore.ToString() + @"").ToList();

                foreach (ModelStylesShopsAvgReply d in list)
                {
                    d.resultAvgReplyTime = Convert.ToDouble(Math.Round(Convert.ToDouble(Convert.ToDouble(d.AvgReplyTime) / 60), 2));
                }

                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        public class ModelStylesShopsRateResponse
        {
            public int CountUserReply { get; set; }
            public int TotalReceiver { get; set; }
            public double RateResponse { get; set; }
        }
        //Tỷ lệ trả lời
        [HttpGet]
        [Route("api/GetStyles_Shops_Product_RateResponse/{idProduct}")]
        public HttpResponseMessage GetStyles_Shops_Product_RateResponse(int idProduct)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                int ID_User = Convert.ToInt32(styles_Shops_Products.UserName);

                //Tổng số người gửi tin nhắn đến gian hàng
                string TotalReceiverTemp = db.Database.SqlQuery<ModelStylesShopsRateResponse>(@"
                Select COUNT (DISTINCT ID_Sender) as TotalReceiver 
                from Styles_Users_Messages where ID_Receiver=" + ID_User).FirstOrDefault().TotalReceiver.ToString();

                //Tổng số người trả lời của gian hàng
                string TotalReplyTemp = db.Database.SqlQuery<ModelStylesShopsRateResponse>(@"
                Select count(ID_User) as CountUserReply from ( select d.ID_User,
                (Select count(ID) from Styles_Users_Messages where ID_Sender=" + ID_User + @" and ID_Receiver=d.ID_User) as CountMessage
                from (select distinct ID_User from (
                select ID_Sender as ID_User from Styles_Users_Messages where ID_Receiver=" + ID_User + @") as t) as d) as a
                where CountMessage>0").FirstOrDefault().CountUserReply.ToString();

                double TotalReceiver = Convert.ToDouble(TotalReceiverTemp);
                double TotalReply = Convert.ToDouble(TotalReplyTemp);

                //var list = db.Database.SqlQuery<ModelStylesShopsRateResponse>(@"Select COUNT (DISTINCT ID_Sender) as TotalReceiver 
                //from Styles_Users_Messages where ID_Receiver=" + ID_User + @"'").ToList();

                double result = (TotalReply / TotalReceiver) * 100;

                //foreach (ModelStylesShopsRateResponse d in list)
                //{
                //    d.RateResponse = Convert.ToDouble(Math.Round(result, 2));
                //}


                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = Convert.ToDouble(Math.Round(result, 2)),
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Sản phẩm cùng gian hàng
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Shops_Relates/{idProduct}/{top}")]
        public HttpResponseMessage GetStyles_Shops_Products_Shops_Relates(int idProduct, int top)
        {
            try
            {
                Styles_Shops_Products styles_Shops_Products = db.Styles_Shops_Products.Find(idProduct);
                string userName = styles_Shops_Products.UserName.ToString();
                var list =
                    (from product in db.Styles_Shops_Products
                     where product.ID_Product != idProduct && product.UserName == userName
                     select product
                     ).Take(top).ToList();
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Sản phẩm yêu thích
        // GET: api/GetStyles_Shops_Products_Shops_Relates
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Shops_Favorites")]
        public HttpResponseMessage GetStyles_Shops_Products_Shops_Favorites()
        {
            try
            {

                //var list = db.Styles_Shops_Products.Where(e => (e.ID_Product != idProduct) && (e.UserName == userName )).ToList();
                var list = "";
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Danh sách sản phẩm theo danh mục
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Shops_By_Catalog/{idCatalog}/{top}/{lang}")]
        public HttpResponseMessage GetStyles_Shops_Products_Shops_By_Catalog(int idCatalog, int top, string lang)
        {
            try
            {
                //var ListChildCustom = from c in db.Styles_Shops_Catalogs
                //                      where c.ID_Catalog == idCatalog
                //                      select c;
                //string[] ListChildCustoms = ListChildCustom.ToList().FirstOrDefault().ListChild.ToString().Split('|');
                //var list =
                //   (from p in db.Styles_Shops_Products
                //    where ListChildCustoms.Contains(p.ID_Catalog.ToString())
                //    && p.Active == true
                //    select new
                //    {
                //        Product = p,
                //        RatingValue = (from r in db.Styles_Shops_Product_Ratings
                //                       where r.ID_Product == p.ID_Product
                //                       select r.Rating).DefaultIfEmpty(0).Average()
                //    }
                //    ).Take(top).ToList();


                var list = db.Database.SqlQuery<Styles_Shops_Products_Template>(@"[dbo].[st_AUC_List_Products_By_IDCatalogParent1] 
                  @LanguageCode, 
                  @Catalogs, 
                  @FeatureHash, 
                  @BrandHash, 
                  @LocationHash,
                  @RoleHash,
                  @Min,
                  @Max",
                  new SqlParameter("LanguageCode", lang),
                  new SqlParameter("Catalogs", idCatalog.ToString()),
                  new SqlParameter("FeatureHash", "-1"),
                  new SqlParameter("BrandHash", "-1"),
                  new SqlParameter("LocationHash", "-1"),
                  new SqlParameter("RoleHash", "-1"),
                  new SqlParameter("Min", "0"),
                  new SqlParameter("Max", "0")
               ).ToList();

                foreach (Styles_Shops_Products_Template d in list)
                {
                    d.RatingValue = (from r in db.Styles_Shops_Product_Ratings
                                     where r.ID_Product == d.ID_Product
                                     select r.Rating).DefaultIfEmpty(0).Average();
                }
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Danh sách sản phẩm trong gỏ hàng
        // GET: api/GetStyles_Shops_Products_Carts
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_Carts")]
        public HttpResponseMessage GetStyles_Shops_Products_Carts()
        {
            try
            {

                //var list = db.Styles_Shops_Products.Where(e => (e.ID_Product != idProduct) && (e.UserName == userName )).ToList();
                var list = "";
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = true,
                        data = list,
                        error_message = ""
                    }
                    );
                return resp;
            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

        //Danh sách sản phẩm tìm kiếm
        [HttpGet]
        [Route("api/GetStyles_Shops_Products_By_Searchs/{key}/{top}/{lang}/{order}/{role_hash}/{location_hash}")]
        public HttpResponseMessage GetStyles_Shops_Products_By_Searchs(string key, int top, string lang, int order, string role_hash, string location_hash)
        {
            try
            {
                string LocationHash = "-1";
                string RoleHash = "-1";
                if (!string.IsNullOrEmpty(role_hash))
                {
                    RoleHash = "";
                    string RoleHashTemp = role_hash;
                    string[] RoleHashList = RoleHashTemp.Split('-');
                    for (int j = 1; j < RoleHashList.Length; j++)
                    {
                        RoleHash = RoleHash + RoleHashList[j].ToString() + ",";
                    }
                    if (RoleHash != "")
                    {
                        RoleHash = RoleHash.TrimEnd(',');
                    }
                    else { RoleHash = "-1"; }
                }
                if (!string.IsNullOrEmpty(location_hash))
                {
                    LocationHash = "";
                    string LocationHashTemp = location_hash;
                    string[] LocationHashList = LocationHashTemp.Split('-');
                    for (int j = 1; j < LocationHashList.Length; j++)
                    {
                        Styles_Users_Locations location = db.Styles_Users_Locations.Find(Convert.ToInt32(LocationHashList[j]));
                        LocationHash = LocationHash + location.ListChild.Replace("|", ",") + ",";
                    }
                    if (LocationHash != "")
                    {
                        LocationHash = LocationHash.TrimEnd(',');
                    }
                    else { LocationHash = "-1"; }
                }

                var listTemp = db.Styles_Shops_Products_Template.SqlQuery(@"[dbo].[st_AUC_List_Products_By_IDCatalogParentSearchKey] 
                  @LanguageCode, 
                  @Catalogs, 
                  @FeatureHash, 
                  @BrandHash, 
                  @LocationHash,
                  @RoleHash,
                  @StrSearch,
                  @Min,
                  @Max",
                  new SqlParameter("LanguageCode", lang),
                  new SqlParameter("Catalogs", "0"),
                  new SqlParameter("FeatureHash", "-1"),
                  new SqlParameter("BrandHash", "-1"),
                  new SqlParameter("LocationHash", LocationHash),
                  new SqlParameter("RoleHash", RoleHash),
                  new SqlParameter("StrSearch", key),
                  new SqlParameter("Min", "0"),
                  new SqlParameter("Max", "0")
                  ).OrderByDescending(x => x.ID_Role);
                if (order == 1)
                {
                    var list = listTemp.ThenBy(x => x.ProductDiscounts).Take(top).ToList();
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                     HttpStatusCode.OK,
                     new RegisterResponseModel()
                     {
                         status = true,
                         data = list,
                         error_message = ""
                     }
                     );
                    return resp;
                }
                else if (order == 2)
                {
                    var list = listTemp.ThenByDescending(x => x.ProductDiscounts).Take(top).ToList();
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                     HttpStatusCode.OK,
                     new RegisterResponseModel()
                     {
                         status = true,
                         data = list,
                         error_message = ""
                     }
                     );
                    return resp;
                }
                else if (order == 3)
                {
                    var list = listTemp.ThenByDescending(x => x.HitsTotal).Take(top).ToList();
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                     HttpStatusCode.OK,
                     new RegisterResponseModel()
                     {
                         status = true,
                         data = list,
                         error_message = ""
                     }
                     );
                    return resp;
                }
                else
                {
                    var list = listTemp.ThenBy(x => x.ProductName).Take(top).ToList();
                    var resp = Request.CreateResponse<RegisterResponseModel>(
                     HttpStatusCode.OK,
                     new RegisterResponseModel()
                     {
                         status = true,
                         data = list,
                         error_message = ""
                     }
                     );
                    return resp;
                }



            }
            catch (System.Exception ex)
            {
                var resp = Request.CreateResponse<RegisterResponseModel>(
                    HttpStatusCode.OK,
                    new RegisterResponseModel()
                    {
                        status = false,
                        data = "",
                        error_message = ex.Message
                    }
                );
                return resp;
            }
        }

    }

    public class Styles_Shops_Products_Detail
    {
        public int ID_Product { get; set; }
        public string LinkSEOCate { get; set; }
        public string Link_SEO { get; set; }
        public string ProductName { get; set; }
        public string PackagingDetails { get; set; }
        public string Image { get; set; }
        public string PriceType { get; set; }
        public Nullable<double> ProductPrice { get; set; }
        public Nullable<double> ProductDiscounts { get; set; }
        public Nullable<int> MinOfQuantity { get; set; }
        public string UnitName { get; set; }
        public string CurrencyCode { get; set; }
        public Nullable<bool> ServiceOrProduct { get; set; }
        public string UserName { get; set; }
        public string Description { get; set; }
        public Nullable<int> TotalLike { get; set; }

        public string PriceText { get; set; }
    }

    public class Styles_Shops_Products_ServiceInfo
    {

        public Nullable<bool> ServiceOrProduct { get; set; }
        public Nullable<int> SupplyAbility { get; set; }
        public Nullable<int> SupplyAbilityUnit { get; set; }
        public string SupplyAbilityTime { get; set; }
        public string SupplyAbilityName { get; set; }
        public string CatalogName { get; set; }
        public string ListPaymentOption { get; set; }
        public string OtherPaymentOptionText { get; set; }
        public string Port { get; set; }
        public Nullable<double> Amount { get; set; }
        public string ServiceStandard { get; set; }
        public string ListShippingOption { get; set; }

        //Thông tin sản phẩm
        public string ProductCode { get; set; }
        public string BrandName { get; set; }
        public string ProductName { get; set; }
        public string ServiceType { get; set; }

    }

    public class Styles_Shops_Products_Features
    {
        public string FeatureName { get; set; }
        public string VariantName { get; set; }
        public string Value { get; set; }
    }

    public class Styles_Shops_Products_CustomInfor
    {
        public string Value { get; set; }
        public string InformationName { get; set; }
    }
}